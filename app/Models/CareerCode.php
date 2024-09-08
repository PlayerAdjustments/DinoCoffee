<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CareerCode extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Table name
     * @var string
     */
    public $table = 'career_codes';

    /**
     * For using routeModelBinding
     * @var string
     */
    public function getRouteKeyName(): string
    {
        return 'joined';
    }

    /**
     * Load relationship functions
     * @var array 
     */
    protected $with = ['careerObj'];

    /**
     * For soft delete
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'joined',
        'career_abbreviation',
        'code',
        'created_by',
        'updated_by',
        'created_at',
        'updated_by'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }

    /**
     * Db relations
     */
    public function careerObj(): HasOne
    {
        return $this->hasOne(Career::class, 'abbreviation', 'career_abbreviation')->withTrashed();
    }

    /**
     * Mutators and accessors
     */
    protected function joined(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim($value);
            }
        );
    }
}
