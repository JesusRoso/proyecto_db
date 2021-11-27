<?php
require_once "modelos/visitas_MO.php";

class visitas_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion();
        $visitas_MO=new visitas_MO($conexion);

        $ciudad_visita=$_POST['ciudad_visita'];
        $direccion_visita=$_POST['direccion_visita'];
        $fecha_visita=$_POST['fecha_visita'];
        $doc_cliente=$_SESSION['documento'];
        $arreglo_doc_reciclador=$visitas_MO->seleccionar($ciudad_visita);
        foreach($arreglo_doc_reciclador as $objeto_doc_reciclador)
        {
            $doc_reciclador=$objeto_doc_reciclador->doc_reciclador;
        }
        $visitas_MO->agregarVisita($doc_cliente,$ciudad_visita,$direccion_visita,$fecha_visita,$doc_reciclador);

        $arreglo_respuesta = [
            "mensaje"=>"EXITO"
        ];

        echo json_encode($arreglo_respuesta);
    }
}
?>