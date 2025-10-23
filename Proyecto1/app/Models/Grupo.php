<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grupo extends Model
{
    //
    protected $table='Grupo';
    public $timestamps = false;

    /**
     * The usuarios that belong to the Grupo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, 'grupo_usuario', 'grupoId', 'usuarioId');
    }
}
