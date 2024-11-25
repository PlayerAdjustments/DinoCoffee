<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Midterm extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    public $table = 'midterms';

    protected $with = [];

    public function getRouteKeyName(): string
    {
        return 'midtermCode';
    }

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'midtermCode',
        'abbreviation',
        'fullName',
        'startDate',
        'endDate',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    protected function casts(): array
    {
        return [];
    }

    protected function midtermCode(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim($value);
            }
        );
    }

    protected function abbreviation(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(strtoupper($value));
            }
        );
    }
    
}
