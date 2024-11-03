<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class StudyPlan extends Model
{
    /** @use HasFactory<\Database\Factories\StudyPlanFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Table name
     * @var string
     */
    public $table = 'study_plans';

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
        return 'slug';
    }

    /**
     * For soft deletes
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes are mass assignable
     * @var array<int,string>
     */
    protected $fillable = [
        'slug',
        'code',
        'career_code',
        'passing_grade',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the attributes that should be cast.
     * @return array<string,string>
     */
    protected function casts(): array
    {
        return [];
    }

    /**
     * Database relations
     */
    public function careercodes(): BelongsTo
    {
        return $this->belongsTo(CareerCode::class, 'career_code', 'joined')->withTrashed();
    }

    /**
     * Mutators and accessors
     */
    protected function slug(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                $cleaned_string = preg_replace('/\/{2,}/', '/', $value);
                return Str::slug(str_replace('/', '-year-', $cleaned_string));
            }
        );
    }

    protected function code(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim($value);
            }
        );
    }

    /**
     * Extracts the NNNN and YYYY from the studyplan code
     *  >-Ex: RVOE no. NNNNNNN/YYYY-<
     */
    protected function RVOENumbers(): Attribute
    {
        return new Attribute(
            get: fn() => [
                'number' => preg_match('/RVOE no\. (\d+)\/\d{4}/', $this->code, $matches) ? (int)$matches[1] : null,
                'year' => preg_match('/RVOE no\. \d+\/(\d{4})/', $this->code, $matches) ? (int)$matches[1] : null,
            ]
        );
    }
}
