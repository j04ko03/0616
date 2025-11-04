<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incidencia extends Model
{
    //
    protected $table = 'Incidencias'; 

    // Desactiva timestamps si tu tabla no tiene created_at y updated_at
    public $timestamps = false;
    protected $primaryKey = 'idIncidencia';

    /**
     * Get the usuario that owns the Incidencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}
