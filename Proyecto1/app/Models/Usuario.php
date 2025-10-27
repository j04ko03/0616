<?php

namespace App\Models;

use App\Models\Grupo;
use App\Models\Proyectos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuario extends Model
{
    //
    protected $table='Usuario';
    public $timestamps = false;

    /**
     * The proyectos that belong to the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(Proyectos::class, 'usuario_proyecto', 'usuarioId', 'proyectoId')->withPivot('rol');
    }

    /**
     * The grupos that belong to the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function grupos(): BelongsToMany
    {
        return $this->belongsToMany(Grupo::class, 'grupo_usuario', 'usuarioId', 'grupoId');
    }
}
