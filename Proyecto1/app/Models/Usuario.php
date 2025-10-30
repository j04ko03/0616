<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Auth;
 
class Usuario extends Auth // Extiende de Auth para funcionalidades de autenticación
{
    use HasFactory;

    protected $table = 'Usuario'; 

    // Desactiva timestamps si tu tabla no tiene created_at y updated_at
    public $timestamps = false;

    // Masificacion de campos asignables
    protected $fillable = [
        'nombre',
        'email', 
        'contraseña'
    ];

    // Valores por defecto
    protected $attributes = [
        'tipoUser' => 1,
        'apodo' => null
    ];

    // Asignar apodo automáticamente al crear usuario una vez el modelo se está creando (BOOT).
    protected static function boot() 
    {
        parent::boot(); //Parent es la clase padre de la que hereda el modelo, en este caso Model.

        static::creating(function ($model) {
            $model->apodo = $model->apodo ?? $model->nombre;
        });
    }

    /**
     * The proyectos that belong to the Usuario
     */
    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(Proyectos::class, 'usuario_proyecto', 'usuarioId', 'proyectoId')->withPivot('rol');
    }

    /**
     * The grupos that belong to the Usuario
     */
    public function grupos(): BelongsToMany
    {
        return $this->belongsToMany(Grupo::class, 'grupo_usuario', 'usuarioId', 'grupoId');
    }
}