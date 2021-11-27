<?php
require_once "modelos/clientes_MO.php";
class clientes_CO
{
    function __construct(){}

    function seleccionarPuntos()
    {
        $conexion=new conexion();
        $clientes_MO=new clientes_MO($conexion);

        $clientes_MO->seleccionarPuntos($_POST['doc_cliente']);
    }

    function actualizarClientes()
    {
        $conexion=new conexion();
        $clientes_MO=new clientes_MO($conexion);

        $correo_nuevo=$_POST['correo_nuevo'];
        $numero_contacto_nuevo=$_POST['numero_contacto_nuevo'];
        $documento_cliente=$_POST['doc_cliente'];
        $puntos_acumulados=$_POST['puntos_acumulados'];
        $total_puntos_acumulados=$_POST['total_puntos_acumulados'];

        $clientes_MO->actualizarClientes($numero_contacto_nuevo,$documento_cliente,
                                        $puntos_acumulados,$total_puntos_acumulados);
        $clientes_MO->actualizarUsuarioCliente($correo_nuevo,$documento_cliente);

        $arreglo_respuesta = [
            "estado"=>"EXITO",
            "mensaje"=>"Registro Actualizado"
        ];
    
        echo json_encode($arreglo_respuesta);
    }
    

    
}
?>