<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Schedule extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    public $table = 'schedules';

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'code',
        'start_hour',
        'end_hour',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    protected function code(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim($value);
            }
        );
    }
}
