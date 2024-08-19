<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Career extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Table name
     * @var string
     */
    public $table = 'careers';

    /**
     * Load relationship functions
     * @var array 
     */
    protected $with = ['coordinadorObj','schoolObj'];

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
        'school_abbreviation',
        'coordinador_matricula',
        'semester_duration',
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
        return [

        ];
    }

    /**
     * Db relations
     */
    public function coordinadorObj() : HasOne
    {
        return $this->hasOne(User::class, 'matricula', 'coordinador_matricula')->withTrashed();
    }

    public function schoolObj() : HasOne
    {
        return $this->hasOne(School::class, 'abbreviation', 'school_abbreviation')->withTrashed();
    }

    /**
     * Mutators and accessors
     */
    protected function abbreviation() : Attribute
    {
        return Attribute::make(
            set:function($value){
                return trim(strtoupper($value));
            }
        );
    }

    protected function name() : Attribute
    {
        return Attribute::make(
            set:function($value){
                return trim(ucfirst(strtolower($value)));
            }
        );
    }

    protected function color() : Attribute
    {
        return Attribute::make(
            set:function($value){
                return trim(strtolower($value));
            }
        );
    }
}
