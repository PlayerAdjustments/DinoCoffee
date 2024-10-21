<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    protected $with = ['studyplans'];

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

    // Connecting models the right way
    public function career() : BelongsTo
    {
        return $this->belongsTo(Career::class, 'career_abbreviation', 'abbreviation')->withTrashed();
    }

    public function studyplans() : HasMany
    {
        return $this->hasMany(StudyPlan::class, 'career_code', 'joined')->withTrashed();
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
