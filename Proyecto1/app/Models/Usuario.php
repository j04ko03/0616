<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Auth;
use Illuminate\Notifications\Notifiable;
use App\Models\Incidencia;

 
class Usuario extends Auth // Extiende de Auth para funcionalidades de autenticación
{
    use HasFactory, Notifiable;

    protected $table = 'Usuario';
    protected $primaryKey = 'id'; 
    protected $autoIncrement = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // Masificacion de campos asignables
    protected $fillable = [
        'nombre',
        'email', 
        'contraseña',
        'fechaCreacion',
    ];

    // Valores por defecto
    protected $attributes = [
        'tipoUser' => 2,
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
    public function proyectos(): BelongsToMany // Relación muchos a muchos con Proyectos
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

    /**
     * The tareas that belong to the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tareas(): BelongsToMany
    {
        return $this->belongsToMany(Tarea::class, 'usuario_tarea', 'idUsuario', 'idTarea');
    }

    /**
     * Get all of the incidencias for the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incidencias(): HasMany
    {
        return $this->hasMany(Incidencia::class, 'idUsuario');
    }

    /**
     * The rol that belong to the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function rol(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class, 'tipoUser', 'id', 'id');
    // }
    
}