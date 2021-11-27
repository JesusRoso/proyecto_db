<?php
class productos_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar()
    {
        $sql="SELECT * FROM sistema_incentivar_reciclaje.producto WHERE activo = 'SI'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function agregarProductos($codigo_producto,$puntos_producto,$nombres_producto)
    {
        $sql="INSERT INTO sistema_incentivar_reciclaje.producto
        values ('$codigo_producto','$nombres_producto',$puntos_producto,'SI')";
        $this->conexion->consultar($sql);
    }
    function eliminarProducto($codigo_producto)
    {
        $sql="UPDATE sistema_incentivar_reciclaje.producto SET activo = 'NO' WHERE cod_producto='$codigo_producto'";
        $this->conexion->consultar($sql);
    }
    function actualiazarProductos($nombre_nuevo,$puntos_nuevo,$productos_id)
    {
        $sql="UPDATE sistema_incentivar_reciclaje.producto SET nombre_producto = '$nombre_nuevo',
        puntos_producto='$puntos_nuevo' WHERE cod_producto='$productos_id'";
        $this->conexion->consultar($sql);
    }
}
?>