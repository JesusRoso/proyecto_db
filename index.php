<?php
    require_once('librerias/constantes.php');
    require_once('librerias/conexion.php');
    

    if(isset($_SESSION['documento']))
    {
        require_once('librerias/front_controller.php');

        if(isset($_GET['ruta']))
        {
            $ruta=$_GET['ruta'];
        }
        else
        {
            $ruta='';
        }
        
        $front_controller = new front_controller($ruta);
    }
    else if(isset($_POST['usuario']) && isset($_POST['clave']))
    {
        require_once('controladores/accesos_CO.php');
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        $accesos_CO = new accesos_CO();
        $accesos_CO-> iniciarSesion($usuario,$clave);
    }
    else if(isset($_POST['numero_documento']))
    {
        require_once('controladores/registros_CO.php');
        $nombres=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $numero_documento=$_POST['numero_documento'];
        $correo=$_POST['correo_electronico'];
        $num_contacto=$_POST['numero_contacto'];
        $fecha_nacimiento=$_POST['fecha_nacimiento'];
        $contrasena=$_POST['password'];        
        $registros_CO = new registros_CO();
        $registros_CO -> registrar($numero_documento,$nombres,$apellidos,$correo,$contrasena,$fecha_nacimiento);
    }
    else if(isset($_GET["opcion"]) && $_GET["opcion"]=='registrarse')
    {
        require_once "vistas/registros_VI.php";
        $registros_VI=new registros_VI();
        $registros_VI->verRegistro();
    }
    else
    {
        require_once('vistas/accesos_VI.php');
        $accesos_VI = new accesos_VI();
        $accesos_VI-> iniciarSesion();
    }
    
?>