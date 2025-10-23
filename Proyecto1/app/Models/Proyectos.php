<?php

namespace App\Models;

use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proyectos extends Model
{
    //
    protected $table='Proyecto';
    public $timestamps = false;

    /**
     * The usuarios that belong to the Proyectos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, 'usuario_proyecto', 'proyectoId', 'usuarioId')->withPivot('rol');
    }

    /**
     * Get all of the tareas for the Proyectos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'proyectoId');
    }
}
