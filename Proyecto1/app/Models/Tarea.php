<?php

namespace App\Models;

use App\Models\Proyectos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
