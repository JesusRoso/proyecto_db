<?php
class admin_MO
{
    private $conexion;
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }
    function seleccionarNombre($documento)
    {
        $sql="select nombres from sistema_incentivar_reciclaje.usuario where documento='$documento'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
}
?>