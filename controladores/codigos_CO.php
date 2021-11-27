<?php
require_once "modelos/codigos_MO.php";

class codigos_CO
{
    function __construct(){}

    function generarCodigo()
    {
        $conexion=new conexion();
        $codigos_MO=new codigos_MO($conexion);

        $doc_cliente=$_POST['doc_cliente'];
        $pers_puntos=$_POST['pers_puntos'];
        $pers_puntos_nuevo=$pers_puntos-100;
        $codigos_MO->generarCodigo($doc_cliente,$pers_puntos);

        $arreglo_respuesta = [
            "estado"=>"EXITO",
            "mensaje"=>"Solicitud exitosa",
            "puntos"=>$pers_puntos_nuevo
        ];

        echo json_encode($arreglo_respuesta);
    }
}
?>