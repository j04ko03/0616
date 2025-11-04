<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    //
    protected $table='Tag';
    public $timestamps = false;

    /**
     * The tareas that belong to the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tareas(): BelongsToMany
    {
        return $this->belongsToMany(Tarea::class, 'Tarea_Tag', 'tagId', 'tareaId');
    }
}
