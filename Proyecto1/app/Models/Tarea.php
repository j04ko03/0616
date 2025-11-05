<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Proyectos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tarea extends Model
{
    //
    protected $table='Tarea';
    public $timestamps = false;

    /**
     * Get the proyecto that owns the Tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyectos::class, 'proyectoId');
    }

    /**
     * The tags that belong to the Tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'Tarea_Tag', 'tareaId', 'tagId');
    }

    /**
     * The usuarios that belong to the Tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, 'usuario_tarea', 'idTarea', 'idUsuario');
    }

    /**
     * Get all of the sprint for the Tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sprint(): BelongsTo
    {
        return $this->belongsTo(Sprint::class, 'idSprint');
    }

    /**
     * Get all of the estado for the Tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estadoId');
    }
}
