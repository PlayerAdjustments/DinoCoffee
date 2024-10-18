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

class School extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Table name
     * @var string
     */
    public $table = 'schools';

    /**
     * Load relationship functions
     * @var array
     */
    protected $with = [];

    /**
     * For using routeModelBinding
     * @var string
     */
    public function getRouteKeyName(): string
    {
        return 'abbreviation';
    }

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
        'abbreviation',
        'name',
        'director_matricula',
        'color',
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

    // Connecting Models the right way

    public function principal(): BelongsTo
    {
        return $this->belongsTo(User::class, 'director_matricula', 'matricula')->withTrashed();
    }

    public function careers(): HasMany
    {
        return $this->hasMany(Career::class, 'school_abbreviation', 'abbreviation');
    }

    /**
     * Mutators and accessors
     */
    protected function abbreviation(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(strtoupper($value));
            }
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(ucfirst(strtolower($value)));
            }
        );
    }

    protected function color(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(strtolower($value));
            }
        );
    }
}
