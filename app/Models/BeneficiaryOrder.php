<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Utils\LogsModelActivity;

class BeneficiaryOrder extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;
    use LogsModelActivity;
    public $table = 'beneficiary_orders';

    protected $appends = [
        'attachment',
    ];

    public const SERVICE_TYPE_SELECT = [
        '0' => '0',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ACCEPT_STATUS_RADIO = [
        'yes' => 'الطلب مقبول',
        'no'  => 'الطلب مرفوض',
    ];

    protected $fillable = [
        'beneficiary_id',
        'service_type',
        'service_id',
        'description',
        'status_id',
        'accept_status',
        'note',
        'refused_reason',
        'done',
        'specialist_id',
        'is_archived',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function beneficiaryFollowupBeneficiaryOrderFollowups()
    {
        return $this->hasMany(BeneficiaryOrderFollowup::class, 'beneficiary_followup_id', 'id');
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getAttachmentAttribute()
    {
        return $this->getMedia('attachment')->last();
    }

    public function status()
    {
        return $this->belongsTo(ServiceStatus::class, 'status_id');
    }

    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    }
}
