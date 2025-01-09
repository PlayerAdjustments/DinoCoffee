<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Allows routeModelBinding
     * 
     * @var string
     */
    public function getRouteKeyName(): string
    {
        return 'abbreviation';
    }

    /**
     * The attributes that are mass assignable
     * 
     * @var array<int,string>
     */
    protected $fillable = [
        'abbreviation',
        'name',
    ];

    /**
     //* Database relations
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role', 'abbreviation');
    }

    /** 
     //? Mutators and accessors
     */
    protected function abbreviation(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtoupper(trim($value)),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower(trim($value))),
        );
    }
}
