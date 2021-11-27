<?php
require_once "modelos/productos_MO.php";

class productos_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion();
        $productos_MO=new productos_MO($conexion);

        $nombres_producto=$_POST['nombres_producto'];
        $puntos_producto=$_POST['puntos_producto'];
        $codigo_producto=$_POST['codigo_producto'];

        $productos_MO->agregarProductos($codigo_producto,$puntos_producto,$nombres_producto);

        $cod_producto=$conexion->lastInsertId();

        $arreglo_respuesta = [
            "estado"=>"EXITO",
            "mensaje"=>"Registro Exitoso",
            "cod_producto"=>$codigo_producto
        ];
        echo json_encode($arreglo_respuesta);
    }
    
    function eliminarProducto()
    {
        $conexion=new conexion();
        $productos_MO=new productos_MO($conexion);
        $codigo_producto=$_POST['eliminarProducto'];
        $productos_MO->eliminarProducto($codigo_producto);
        echo "EXITO";
    }

    function actualizarProductos()
    {
        $conexion=new conexion();
        $productos_MO=new productos_MO($conexion);
        $nombre_nuevo=$_POST['nombre_nuevo'];
        $puntos_nuevo=$_POST['puntos_nuevo'];
        $productos_id=$_POST['productos_id'];
        $productos_MO->actualiazarProductos($nombre_nuevo,$puntos_nuevo,$productos_id);
        $arreglo_respuesta = [
            "estado"=>"EXITO",
            "mensaje"=>"Registro Actualizado"
        ];

        echo json_encode($arreglo_respuesta);
    }
}
?>