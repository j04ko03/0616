<?php

namespace App\Models;

use App\Models\Grupo;
use App\Models\Tarea;
use App\Models\Estado;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyectos extends Model
{
    //
    protected $table = 'Proyecto';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'fechaCreacion',
        'fechaEntrega',
        'estadoId',
        'isDeleted',
        'descripcion',
        'presupuesto',
        'linkProyecto'
    ];

    protected $casts = [
        'fechaCreacion' => 'datetime',
        'fechaEntrega' => 'datetime',
        'estadoId' => 'integer',
        'isDeleted' => 'boolean',
        'presupuesto' => 'decimal:2',
    ];

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

    /**
     * The grupos that belong to the Proyectos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function grupos(): BelongsToMany
    {
        return $this->belongsToMany(Grupo::class, 'grupo_proyecto', 'proyectoid', 'grupoId');
    }

    /**
     * Get all of the estado for the Proyectos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'id');
    }
}
