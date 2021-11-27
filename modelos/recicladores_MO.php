<?php
class recicladores_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar()
    {
        $sql="SELECT * FROM sistema_incentivar_reciclaje.usuario WHERE rol = 'RECICLADOR'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregarUsuariosRecicladores($nombres_reciclador,$apellidos_reciclador,$documento_reciclador,
                                         $fnacimiento_reciclador,$correo_reciclador,
                                         $clave_reciclador)
    {
        $sql="INSERT INTO sistema_incentivar_reciclaje.usuario  
        VALUES ('$documento_reciclador','$nombres_reciclador','$apellidos_reciclador','$correo_reciclador',
                '$clave_reciclador','RECICLADOR','$fnacimiento_reciclador')";
        $this->conexion->consultar($sql);
    }
    function agregaRecicladores($doc_reciclador,$codigo_reciclador,$ncontacto_reciclador,$ciudad_reciclador)
    {
        $sql="INSERT INTO sistema_incentivar_reciclaje.reciclador
        values ('$doc_reciclador','$codigo_reciclador','$ncontacto_reciclador','57','54','$ciudad_reciclador')";
        $this->conexion->consultar($sql);
    }
    function actualizarUsuarioReciclador($correo_nuevo,$documento_reciclador)
    {
        $sql="UPDATE sistema_incentivar_reciclaje.usuario SET correo_electronico = '$correo_nuevo' 
        WHERE documento = '$documento_reciclador'";
        $this->conexion->consultar($sql);
    }
    function actualizarRecicladores($numero_contacto_nuevo,$documento_reciclador,$ciudad_reciclador)
    {
        $sql="UPDATE sistema_incentivar_reciclaje.reciclador SET numero_contacto = '$numero_contacto_nuevo',
        cod_ciudad='$ciudad_reciclador' WHERE doc_reciclador = '$documento_reciclador'";
        $this->conexion->consultar($sql);
    }
}
?>