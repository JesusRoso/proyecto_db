<?php
require_once('modelos/registros_MO.php');
class registros_CO
{
    function __construct(){}

    function registrar($num_documento,$nombres,$apellidos,$correo,$contrasena,$fecha_nacimiento)
    {
        $conexion = new conexion();
        $registros_MO = new registros_MO($conexion);       
        $registros_MO-> registrar($num_documento,$nombres,$apellidos,$correo,$contrasena,$fecha_nacimiento);
        $_SESSION['rol']='CLIENTE';
        $_SESSION['documento']=$num_documento; 
        $registros_MO->registrarUsuario($num_documento,$_POST['numero_contacto']);
        header('Location: index.php');
    }
    function salir()
    {
        session_destroy();
    }
}
?>