<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    /**
     * Use the following command to generate the Model, Migration, Factory, Seeder & Controller
     * php artisan make:model @ModelName --migration --factory --seed --controller
     */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Table name
     * @var string
     */
    public $table = 'roles';

    /**
     * For using routeModelBinding
     * @var string
     */
    public function getRouteKeyName(): string
    {
        return 'abbreviation';        
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
        'abbreviation',
        'name',
        'created_at',
        'updated_at',
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
    public function userObj() : BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTrashed();
    }

    /**
     * Mutators and accessors
     */
    protected function abbreviation() : Attribute
    {
        return Attribute::make(
            set:function($value){
                return strtoupper($value);
            }
        );
    }

    protected function name() : Attribute
    {
        return Attribute::make(
            set:function($value){
                return ucfirst(strtolower($value));
            }
        );
    }
}
