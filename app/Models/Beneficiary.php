<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiary extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'beneficiaries';

    public const CAN_WORK_SELECT = [
        'yes' => 'نعم',
        'no'  => 'لا',
    ];

    public const PROFILE_STATUS_SELECT = [
        'uncompleted' => 'غير مكتمل',
        'pending' => 'قيد المراجعة',
        'approved' => 'موافق عليه',
        'rejected' => 'مرفوض',
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
        'dob',
        'address',
        'latitude',
        'longitude',
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
}
