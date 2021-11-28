<?php
require_once "modelos/recicladores_MO.php";

class recicladores_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion();
        $recicladores_MO=new recicladores_MO($conexion);

        $nombres_reciclador=$_POST['nombres_reciclador'];
        $apellidos_reciclador=$_POST['apellidos_reciclador'];
        $documento_reciclador=$_POST['documento_reciclador'];
        $fnacimiento_reciclador=$_POST['fnacimiento_reciclador'];
        $ncontacto_reciclador=$_POST['ncontacto_reciclador'];
        $correo_reciclador=$_POST['correo_reciclador'];
        $clave_reciclador=$_POST['clave_reciclador'];
        $ciudad_reciclador=$_POST['ciudad_reciclador'];
        $codigo_reciclador=$_POST['codigo_reciclador'];
        
        $recicladores_MO->agregarUsuariosRecicladores($nombres_reciclador,$apellidos_reciclador,$documento_reciclador,
                                                      $fnacimiento_reciclador,$correo_reciclador,
                                                      $clave_reciclador);
        $recicladores_MO->agregaRecicladores($documento_reciclador,$codigo_reciclador,$ncontacto_reciclador,$ciudad_reciclador);

        $doc_reciclador=$conexion->lastInsertId();

        $arreglo_respuesta = [
            "mensaje"=>"EXITO",
            "doc_reciclador"=>$documento_reciclador
        ];

        echo json_encode($arreglo_respuesta);
    }
    function actualizarRecicladores()
    {
        $conexion=new conexion();
        $recicladores_MO=new recicladores_MO($conexion);

        $correo_nuevo=$_POST['correo_nuevo'];
        $numero_contacto_nuevo=$_POST['numero_contacto_nuevo'];
        $documento_reciclador=$_POST['doc_reciclador'];
        $ciudad_reciclador=$_POST['ciudad_reciclador'];
        
        $recicladores_MO->actualizarUsuarioReciclador($correo_nuevo,$documento_reciclador);
        $recicladores_MO->actualizarRecicladores($numero_contacto_nuevo,$documento_reciclador,$ciudad_reciclador);

        $arreglo_respuesta = [
            "estado"=>"EXITO",
            "mensaje"=>"Registro Actualizado"
        ];

        echo json_encode($arreglo_respuesta);
    }
}
?>