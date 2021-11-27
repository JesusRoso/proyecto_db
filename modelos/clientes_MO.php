<?php
require_once "controladores/clientes_CO.php";
class clientes_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar()
    {
        $sql="SELECT * FROM sistema_incentivar_reciclaje.usuario WHERE rol = 'CLIENTE'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function seleccionarPuntos($documento_cliente)
    {
        $sql="SELECT total_puntos,numero_contacto FROM sistema_incentivar_reciclaje.cliente WHERE doc_cliente = '$documento_cliente'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function actualizarUsuarioCliente($correo_nuevo,$documento_cliente)
    {
        $sql="UPDATE sistema_incentivar_reciclaje.usuario SET correo_electronico = '$correo_nuevo' 
        WHERE documento = '$documento_cliente'";
        $this->conexion->consultar($sql);
    }
    function actualizarClientes($numero_contacto_nuevo,$documento_cliente,
                                $puntos_acumulados,$total_puntos_acumulados)
    {
        $total_puntos=$puntos_acumulados+$total_puntos_acumulados;
        $sql="UPDATE sistema_incentivar_reciclaje.cliente SET numero_contacto = '$numero_contacto_nuevo',
        total_puntos='$total_puntos' WHERE doc_cliente = '$documento_cliente'";
        $this->conexion->consultar($sql);
    }
}
?>