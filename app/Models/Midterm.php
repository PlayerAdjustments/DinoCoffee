<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Midterm extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    // Tabla asociada al modelo
    protected $table = 'midterms';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'midtermCode',
        'abbreviation',
        'fullName',
        'startDate',
        'endDate',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    // Casts (puedes añadir aquí cualquier tipo si es necesario)
    protected $casts = [];

    // Clave utilizada para las rutas
    public function getRouteKeyName(): string
    {
        return 'midtermCode';
    }

    // Mutadores
    protected function midtermCode(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => trim($value)
        );
    }

    protected function abbreviation(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper(trim($value))
        );
    }
}

