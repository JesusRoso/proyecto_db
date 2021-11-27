<?php
class codigos_MO
{
    private $conexion;
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }
    function generarCodigo($doc_cliente,$pers_puntos)
    {
        $pers_puntos_nuevo=$pers_puntos-100;
        $sql="UPDATE sistema_incentivar_reciclaje.cliente SET total_puntos='$pers_puntos_nuevo' WHERE doc_cliente='$doc_cliente'";
        $this->conexion->consultar($sql);
    }
}
?>