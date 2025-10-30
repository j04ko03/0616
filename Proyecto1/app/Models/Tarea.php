<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Proyectos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
