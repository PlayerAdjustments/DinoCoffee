<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class StudyPlan extends Model
{
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
    protected $with = ['careercodeObj'];

    /**
     * For using routeModelBinding
     * @var string
     */
    public function getRouteKeyName(): string
    {
        return 'code';        
    }

    /**
     * Primary key
     * @var string
     */
    //protected $primaryKey = 'abbreviation';

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
        'slug',
        'code',
        'career_code',
        'passing_grade',
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
        return [

        ];
    }

    /**
     * Db relations
     */
    public function careercodeObj() : HasOne
    {
        return $this->hasOne(CareerCode::class, 'joined', 'career_code')->withTrashed();
    }

    public function careerCode()
    {
        return $this->belongsTo(CareerCode::class, 'career_code', 'joined');
    }

    /**
     * Mutators and accessors
     */
    protected function slug() : Attribute
    {
        return Attribute::make(
            set:function($value){
                return Str::slug(str_replace('/','-year-',$value));
            }
        );
    }

    protected function code() : Attribute
    {
        return Attribute::make(
            set:function($value){
                return trim($value);
            }
        );
    }
}
