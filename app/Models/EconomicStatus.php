<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class EconomicStatus extends Model
{
    use SoftDeletes, HasFactory;
    use HasTranslations;

    public $table = 'economic_statuses';
    public array $translatable = ['name'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        'income'  => 'دخل',
        'expense' => 'مصروف',
    ];

    protected $fillable = [
        'name',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
