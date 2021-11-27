<?php
class accesos_MO
{
    private $conexion;
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    function iniciarSesion($usuario,$clave)
    {
        $sql="select documento,rol from sistema_incentivar_reciclaje.usuario 
        where correo_electronico='$usuario' and contrasena='$clave'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
}
?>