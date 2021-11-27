<?php
require_once('modelos/accesos_MO.php');
class accesos_CO
{
    function __construct(){}

    function iniciarSesion($usuario,$clave)
    {
        $conexion = new conexion();
        $accesos_MO = new accesos_MO($conexion);       
        $arreglo=$accesos_MO-> iniciarSesion($usuario,$clave);
        if($arreglo)
        {
            $objeto_accesos=$arreglo[0];
            $documento = $objeto_accesos->documento;
            $rol = $objeto_accesos->rol;
            $_SESSION['documento']=$documento;
            $_SESSION['rol']=$rol;
        }
        header('Location: index.php');
    }
    function salir()
    {
        session_destroy();
    }
}
?>