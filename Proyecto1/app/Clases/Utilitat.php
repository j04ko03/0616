<?php

namespace App\Clases;

class Utilitat{
    public static function errorMessage($e){
        if(!empty($e->errorInfo[1])){
            switch($e->errorInfo[1]){
                case 2601:
                    $missatge = 'Registre duplicat';
                    break;
                case 547:
                    $missatge = 'Registre amb elements relacionats';
                    break;
                default:
                    $missatge = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                    break;
            }
        }else{
            switch(e->getCode()){
                case 1044:
                    $missatge = 'Usuari i/o password incorrectes';
                    break;
                case 1049:
                    $missatge = 'BD desconeguda revisa la conexió';
                    break;
                case 2002:
                    $missatge = 'No es troba el servidor';
                    break;
                default:
                    $missatge = $e->getCode() . ' - ' . $e->getMessage();
                    break;
            }
        }
        return $missatge;
    }
}