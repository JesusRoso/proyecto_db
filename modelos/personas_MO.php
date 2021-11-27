<?php
class personas_MO
{
    private $conexion;
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }
    function seleccionar($documento)
    {
        $sql="select nombres from sistema_incentivar_reciclaje.usuario where documento='$documento'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function seleccionarPuntos($documento)
    {
        $sql2="select total_puntos from sistema_incentivar_reciclaje.cliente where doc_cliente='$documento'";
        $this->conexion->consultar($sql2);
        return $this->conexion->extraerRegistro();
    }
}
?>