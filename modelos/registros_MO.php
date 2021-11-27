<?php
class registros_MO
{
    private $conexion;
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    function registrar($num_documento,$nombres,$apellidos,$correo,$contrasena,$fecha_nacimiento)
    {
        $sql="insert into sistema_incentivar_reciclaje.usuario 
        values ('$num_documento','$nombres','$apellidos','$correo','$contrasena','CLIENTE','$fecha_nacimiento')";
        $this->conexion->consultar($sql);
    }
    function registrarUsuario($doc_cliente,$numero_contacto)
    {
        $sql="insert into sistema_incentivar_reciclaje.cliente
        values ('$doc_cliente','$numero_contacto',0)";
        $this->conexion->consultar($sql);
    }
}
?>