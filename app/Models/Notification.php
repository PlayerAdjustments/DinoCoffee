<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Notification extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

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
        'user_matricula',
        'subject',
        'body',
        'icon',
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

    // protected function subject() : Attribute
    // {
    //     return Attribute::make(
    //         set:function($value){
    //             return trim(ucwords(strtolower($value)));
    //         }
    //     );
    // }

    // protected function body() : Attribute
    // {
    //     return Attribute::make(
    //         set:function($value){
    //             return trim(ucwords(strtolower($value)));
    //         }
    //     );
    // }

    // protected function icon() : Attribute
    // {
    //     return Attribute::make(
    //         set:function($value){
    //             return trim(ucwords(strtolower($value)));
    //         }
    //     );
    // }
}
