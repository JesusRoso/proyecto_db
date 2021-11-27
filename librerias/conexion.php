<?php
class conexion{

    private $enlace;
    private $resultado;
    function __construct()
    {   
        $ip_maquina = IP_MAQUINA;
        $base_de_datos = BASE_DE_DATOS;
        $usuario=USUARIO;
        $clave=CLAVE;
        $puerto = PUERTO;

        try {
            $this->enlace = new PDO("pgsql:host=$ip_maquina;port=$puerto;dbname=$base_de_datos", $usuario,$clave);
            return $this->enlace;

        } catch (PDOException $e) {
            echo 'algo';
            print "¡Error!: " . $e->getMessage() . "<br/>";
            exit();
        }
    }
    function consultar($sql)
    {
        $this->resultado = $this->enlace->query($sql) or $this->errorConsulta($sql);
    }

    function extraerRegistro()
    {
        return $this->resultado -> fetchAll(PDO::FETCH_OBJ);
    }

    function lastInsertId()
    {
        return $this->enlace->lastInsertId();
    }

    function errorConsulta($sql)
    {
        $arreglo_respuesta=[
            "estado"=>"ERROR",
            "mensaje"=>"Consulta mal estructurada: $sql"
        ];
        exit(json_encode($arreglo_respuesta));
    }
}
?>