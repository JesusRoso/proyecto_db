<?php
class visitas_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($ciudad_visita)
    {
        $num=rand(1,4);
        $cod_reci=$ciudad_visita.'0';
        $sql="SELECT doc_reciclador FROM sistema_incentivar_reciclaje.reciclador 
        WHERE cod_ciudad = '$ciudad_visita' AND cod_reciclador LIKE ('$cod_reci%$num')";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregarVisita($doc_cliente,$ciudad_visita,$direccion_visita,$fecha_visita,$doc_reciclador)
    {
        $sql="INSERT INTO sistema_incentivar_reciclaje.solicitud
        values (nextval('sistema_incentivar_reciclaje.solicitud_cod_solicitud_seq'),'$doc_cliente','$doc_reciclador','$ciudad_visita','$direccion_visita','$fecha_visita',0)";
        $this->conexion->consultar($sql);
    }
}
?>