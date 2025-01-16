<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * For soft delete
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_matricula',
        'subject',
        'body',
        'icon',
        'created_by',
        'updated_by'
    ];

    /**
     * Database relations
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_matricula', 'matricula');
    }
}
