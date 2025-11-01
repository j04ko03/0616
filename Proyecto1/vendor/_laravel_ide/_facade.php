<?php

namespace Illuminate\Support\Facades;

interface Auth
{
    /**
     * @return \App\Models\Usuario|false
     */
    public static function loginUsingId(mixed $id, bool $remember = false);

    /**
     * @return \App\Models\Usuario|false
     */
    public static function onceUsingId(mixed $id);

    /**
     * @return \App\Models\Usuario|null
     */
    public static function getUser();

    /**
     * @return \App\Models\Usuario
     */
    public static function authenticate();

    /**
     * @return \App\Models\Usuario|null
     */
    public static function user();

    /**
     * @return \App\Models\Usuario|null
     */
    public static function logoutOtherDevices(string $password);

    /**
     * @return \App\Models\Usuario
     */
    public static function getLastAttempted();
}