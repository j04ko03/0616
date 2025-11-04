<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sprint extends Model
{
    //
    protected $table='Sprint';
    public $timestamps = false;

    /**
     * Get all of the tareas for the Sprint
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'idSprint', 'local_key');
    }
}
