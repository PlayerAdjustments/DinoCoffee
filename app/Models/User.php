<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'matricula',
        'name',
        'first_lastname',
        'second_lastname',
        'role',
        'sex',
        'email',
        'phone_number',
        'birthday',
        'password',
        'cedula_profesional',
        'avatar',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birthday' => 'date',
            'password' => 'hashed',
        ];
    }

    /**
     * Database relations
     */

    /**
     * Mutators and accessors
     */
    protected function matricula(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return trim($value);
            }
        );
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->name . ' ' . $this->first_lastname . ' ' . $this->second_lastname
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(ucwords(strtolower($value)));
            }
        );
    }

    protected function firstLastname(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(ucwords(strtolower($value)));
            }
        );
    }

    protected function secondLastname(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(ucwords(strtolower($value)));
            }
        );
    }

    protected function role(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(strtoupper($value));
            }
        );
    }

    protected function sex(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return trim(strtoupper($value));
            }
        );
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return Hash::make($value);
            }
        );
    }

    protected function avatar(): Attribute
    {
        return Attribute::make(
            set: function () {
                /**
                 * Assigns a random avatar to a user.
                 */
                return fake()->randomElement([
                    'Parasauri.jpg',
                    'Bronti.jpg',
                    'Seri.jpg',
                    'Rexxi.jpg',
                    'Steggi.jpg',
                    'Spyni.jpg',
                    'GraduationRexxi.jpg',
                    'GraduationTeddy.jpg',
                    'GraduationCorgi.jpg',
                    'Arcti.jpg',
                    'Pengi.jpg',
                    'Mooi.jpg',
                    'ValentineMooi.jpg',
                    'Piggi.jpg',
                    'Monki.jpg'
                ]);
            }
        );
    }
}
