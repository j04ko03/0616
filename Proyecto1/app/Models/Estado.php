<?php

namespace App\Models;

use App\Models\Proyectos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estado extends Model
{
    //
    protected $table='Estado';
    public $timestamps = false;

    /**
     * Get the proyectos that owns the Estado
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos(): HasMany
    {
        return $this->hasMany(Proyectos::class, 'estadoId');
    }

    /**
     * Get all of the tareas for the Estado
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'estadoId');
    }
}
