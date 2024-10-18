<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Table name
     * @var string
     */
    public $table = 'users';

    /**
     * Load relationship functions
     * @var array
     */
    protected $with = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * For using routeModelBinding
     * @var string
     */
    public function getRouteKeyName(): string
    {
        return 'matricula';
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
        'updated_by',
        'created_at',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Db relations
     */

    public function roleDetails(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role', 'abbreviation')->withTrashed();
    }

    /**
     * Scopes
     * Useful for querying certain data
     */
    public function scopeOfFullname(Builder $query, string $fullName): void
    {
        $query->where(DB::raw("CONCAT(`name`, ' ', `first_lastname`, ' ', `second_lastname`)"), 'like', '%' . $fullName . '%');
    }

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
