<?php
class front_controller{
    function __construct($ruta)
    {
        if(empty($ruta))
        {
            if($_SESSION['rol']=='ADMINISTRADOR'){
                $carpeta = 'vistas';
                $clase='admin_VI';
                $metodo='verAdmin';
            }else{
                $carpeta = 'vistas';
                $clase='menu_VI';
                $metodo='verMenu';
            }
        }
        else
        {
            $arreglo_ruta=explode('/',$ruta);
            $clase=$arreglo_ruta[0];
            $metodo=$arreglo_ruta[1];
            $sufijo=substr($clase,-2);
            if($sufijo=='CO')
            {   
                $carpeta='controladores';
            }
            elseif($sufijo=='VI')
            {
                $carpeta='vistas';
            }
            
        }
        $archivo=$clase.".php";
        require_once ("$carpeta/$archivo");
        $objeto=new $clase();
        $objeto->$metodo(); 
    }
}
?>