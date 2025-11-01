<?php

namespace Illuminate\Http;

interface Request
{
    /**
     * @return \App\Models\Usuario|null
     */
    public function user($guard = null);
}