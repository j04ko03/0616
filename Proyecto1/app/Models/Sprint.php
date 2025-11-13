<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sprint extends Model
{
    //
    protected $table = 'Sprint';
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];


    /**
     * Get all of the tareas for the Sprint
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'idSprint');
    }

    /**
     * The proyectos that belong to the Sprint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(Proyectos::class, 'proyecto_sprint', 'sprintId', 'proyectoId');
    }
}
