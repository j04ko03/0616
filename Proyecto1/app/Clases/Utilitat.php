<?php

namespace App\Clases;
/**
 * Clase de utilidades para gestionar y traducir errores SQL Server / MySQL.
 *
 * Proporciona mensajes legibles al usuario final cuando se producen errores 
 * durante operaciones CRUD.
 *
 * @package App\Clases
 */
class Utilitat{
    /**
     * errorMessage es una función que acoge los errores de sql server/mysql por parámetro y devuelve 
     * en formato string que error es, de este modo esl usuario puede entender que pasa al hacer el CRUD
     * @param mixed $e Escepción devuelta por el sistema
     * @return string mensaje de error listo para mostrar al usuario
     * @author josep <jguius2021@cepnet.net>
     */
    public static function errorMessage($e){
        if (!empty($e->errorInfo[1])) {
            switch ($e->errorInfo[1]) {
                // SQL Server
                case 2627:
                    $missatge = 'Registro duplicado (clave primaria)';
                    break;
                case 547:
                    $missatge = 'Registro con elementos relacionados (FK)';
                    break;
                case 2601:
                    $missatge = 'Registro duplicado (índice único)';
                    break;
                case 4060:
                    $missatge = 'Base de datos no disponible';
                    break;
                case 18456:
                    $missatge = 'Login fallido en SQL Server';
                    break;

                // MySQL
                case 1044:
                    $missatge = 'Usuario y/o contraseña incorrectos';
                    break;
                case 1045:
                    $missatge = 'Usuario y/o contraseña incorrectos';
                    break;
                case 1049:
                    $missatge = 'Base de datos desconocida';
                    break;
                case 2002:
                    $missatge = 'Servidor de base de datos no encontrado';
                    break;
                case 1062:
                    $missatge = 'Registro duplicado';
                    break;
                case 1451:
                    $missatge = 'Registro con elementos relacionados (FK)';
                    break;
                case 1146:
                    $missatge = 'Tabla no encontrada';
                    break;
                case 1054:
                    $missatge = 'Columna no encontrada';
                    break;
                case 1064:
                    $missatge = 'Error de sintaxis SQL';
                    break;

                default:
                    $missatge = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                    break;
            }
        } else {
            // Si no hay errorInfo, usar getCode()
            switch ($e->getCode()) {
                // SQL Server PDO
                case '23000':
                    $missatge = 'Violación de restricción (duplicado o FK)';
                    break;
                case '42S02':
                    $missatge = 'Tabla no encontrada';
                    break;
                case 'HY000':
                    $missatge = 'Error general de base de datos';
                    break;

                // MySQL genérico
                case 1044:
                    $missatge = 'Usuario y/o contraseña incorrectos';
                    break;
                case 1045:
                    $missatge = 'Usuario y/o contraseña incorrectos';
                    break;
                case 1049:
                    $missatge = 'Base de datos desconocida';
                    break;
                case 2002:
                    $missatge = 'Servidor de base de datos no encontrado';
                    break;

                default:
                    $missatge = $e->getCode() . ' - ' . $e->getMessage();
                    break;
            }
        }
        return $missatge;
    }
}