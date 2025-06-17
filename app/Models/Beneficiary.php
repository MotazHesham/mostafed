<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Utils\LogsModelActivity;
use App\Models\BeneficiaryOrder;
use App\Models\BeneficiaryFamily;
use App\Models\BeneficiaryFile;
use Spatie\Activitylog\Contracts\Activity;

class Beneficiary extends Model
{
    use SoftDeletes, HasFactory;
    use LogsModelActivity;
    
    public $table = 'beneficiaries';

    public const CAN_WORK_SELECT = [
        'yes' => 'نعم',
        'no'  => 'لا',
    ];

    public const PROFILE_STATUS_SELECT = [
        'uncompleted' => 'غير مكتمل',
        'request_join' => 'طلب الانضمام',
        'in_review' => 'قيد المراجعة',
        'approved' => 'موافق عليه',
        'rejected' => 'مرفوض',
    ];

    public const FORM_STEPS = [
        'login_information' => 'بيانات التسجيل',
        'basic_information' => 'بيانات الأساسية',
        'work_information' => 'بيانات العمل',
        'family_information' => 'بيانات الأسرة',
        'economic_information' => 'بيانات الاقتصادية',
        'documents' => 'المستندات',
    ];

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'nationality_id',
        'marital_status_id',
        'job_type_id',
        'educational_qualification_id',
        'profile_status',
        'form_step',
        'dob',
        'address',
        'latitude',
        'longitude',
        'region_id',
        'city_id',
        'district_id',
        'street',
        'building_number',
        'floor_number',
        'health_condition_id',
        'custom_health_condition',
        'disability_type_id',
        'custom_disability_type',
        'can_work',
        'incomes',
        'total_incomes',
        'expenses',
        'total_expenses',
        'is_archived',
        'specialist_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function beneficiaryBeneficiaryOrders()
    {
        return $this->hasMany(BeneficiaryOrder::class, 'beneficiary_id', 'id');
    }

    public function beneficiaryFamilies()
    {
        return $this->hasMany(BeneficiaryFamily::class, 'beneficiary_id', 'id');
    }

    public function beneficiaryFiles()
    {
        return $this->hasMany(BeneficiaryFile::class, 'beneficiary_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function marital_status()
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status_id');
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function educational_qualification()
    {
        return $this->belongsTo(EducationalQualification::class, 'educational_qualification_id');
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function health_condition()
    {
        return $this->belongsTo(HealthCondition::class, 'health_condition_id');
    }

    public function disability_type()
    {
        return $this->belongsTo(DisabilityType::class, 'disability_type_id');
    }

    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    } 

    public function economicCategory()
    {
        if($this->total_incomes < 5000){
            return 'أ';
        }elseif($this->total_incomes >= 5000 && $this->total_incomes < 8000){
            return 'ب';
        }elseif($this->total_incomes >= 8000 && $this->total_incomes < 12000){
            return 'ج';
        }elseif($this->total_incomes > 12000){
            return 'د';
        }
    } 
    
    public function getLogAttributes()
    {
        return [
            'profile_status',  'dob', 'address', 'latitude',
            'longitude', 'street', 'building_number', 'floor_number',
            'custom_health_condition', 'custom_disability_type',
            'can_work', 'incomes',  'expenses',  'is_archived',

            'region->id', 'region->name',
            'city->id', 'city->name',
            'district->id', 'district->name',
            'nationality->id', 'nationality->name',
            'marital_status->id', 'marital_status->name',
            'job_type->id', 'job_type->name',
            'educational_qualification->id', 'educational_qualification->name',
            'health_condition->id', 'health_condition->name',
            'disability_type->id', 'disability_type->name',
            'specialist->id', 'specialist->name',
        ];
    }

    public function getActivityDescriptionForEvent($eventName){
        if ($eventName == 'created') {
            return "تم فتح ملف جديد للمستفيد";
        } elseif ($eventName == 'updated') {
            return "تم تحديث بيانات المستفيد";
        } elseif ($eventName == 'deleted') {
            return 'تم حذف ملف المستفيد';
        }
    } 
    public function getLogNameToUse(): ?string
    {
        return 'beneficiary_activity';
    }
    
    public function getCustomAttributes(Activity $activity)
    {   
        $properties = $activity->properties ?? [];

        $transformData = function($data, &$properties) {
            $oldAttributes = $properties['old'] ?? [];
            $currentAttributes = $properties['attributes'] ?? [];
            
            if (isset($data['profile_status']) && isset(self::PROFILE_STATUS_SELECT[$data['profile_status']])) {
                $data['profile_status'] = self::PROFILE_STATUS_SELECT[$data['profile_status']];
            }
            if (isset($data['can_work']) && isset(self::CAN_WORK_SELECT[$data['can_work']])) {
                $data['can_work'] = self::CAN_WORK_SELECT[$data['can_work']];
            }
            if(isset($data['is_archived'])){
                $data['is_archived'] = $data['is_archived'] == 1 ? 'مؤرشف' : 'غير مؤرشف';
            }
            

            // Handle special cases for incomes and expenses
            if (isset($currentAttributes['incomes']) && isset($oldAttributes['incomes'])) {
                $changes = compareJsonValues($oldAttributes['incomes'], $currentAttributes['incomes']);
                foreach ($changes['changed'] as $key => $change) {
                    $income = EconomicStatus::find($key);
                    if ($income) {
                        $data[$income->getTranslation('name','ar')] = $change['new'];
                    }
                }
                unset($data['incomes']);
                $properties['skipped_attributes'] = [
                    'old' => $oldAttributes['incomes'],
                    'new' => $currentAttributes['incomes'],
                ];
            }

            if (isset($currentAttributes['expenses']) && isset($oldAttributes['expenses'])) {
                $changes = compareJsonValues($oldAttributes['expenses'], $currentAttributes['expenses']);
                foreach ($changes['changed'] as $key => $change) {
                    $expense = EconomicStatus::find($key);
                    if ($expense) {
                        $data[$expense->getTranslation('name','ar')] = $change['new'];
                    }
                }
                unset($data['expenses']);
                $properties['skipped_attributes'] = [
                    'old' => $oldAttributes['expenses'],
                    'new' => $currentAttributes['expenses'],
                ];
            }
            return $data;
        }; 

        if (isset($properties['attributes'])) {
            $properties['attributes'] = $transformData($properties['attributes'], $properties); 
        }
        
        if (isset($properties['old'])) {
            $properties['old'] = $transformData($properties['old'], $properties); 
        }
        
        return $properties;
    } 
}
