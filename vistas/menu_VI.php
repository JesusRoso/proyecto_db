<?php
class menu_VI
{
    
    function __construct(){}

    function verMenu()
    {
        require_once ('modelos/personas_MO.php');
        $conexion = new conexion();
        $personas_MO = new personas_MO($conexion);
        $arreglo=$personas_MO->seleccionar($_SESSION['documento']);
        $arreglo2=$personas_MO->seleccionarPuntos($_SESSION['documento']);
        $objeto_personas=$arreglo[0];
        $objeto_personas2=$arreglo2[0];
        $pers_nombres=$objeto_personas->nombres;
        $pers_puntos=$objeto_personas2->total_puntos;
        ?>       
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="view/styleInicio.css">
            <link rel="stylesheet" href="view/styleHeader.css">
            <link rel="stylesheet" href="view/styleFooter.css">
            <!-- Toastr -->
            <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
            <!-- Font Awesome Icons -->
            <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css">     
            <title>Inicio</title>
        </head>
        <body>
        <div class="general">
            <div class="header">
                <ul class="header__list" id="header__list">
                    <li class="header__elements header__element--one">Inicio</li>
                    <li id="datos_cliente" class="header__elements"><?php echo $pers_nombres.' '.$pers_puntos.' '; ?>Puntos</li>
                    <li class="header__elements header__element--three"><a href="" onclick="salir();">Cerrar Sesión</a></li>
                </ul>
                <a class="header__menu-squared" ><img id="menu-squared" src="https://img.icons8.com/ios/50/000000/menu-squared-2--v1.png"/></a>
            </div>
            <div class="container">
                <div class="container__rows">
                    <div class="container__rows--option">
                        <a href="index.php?ruta=visitas_VI/verVisitas" class="link__columnOne">
                            <div class="container__rows--optionLink">
                                <p>Solicitar Visita</p>
                            </div>
                        </a>
                    </div>
                    <div class="container__rows--option">
                        <a href="index.php?ruta=simular_VI/verSimular" class="link__columnOne">
                            <div class="container__rows--optionLink">
                                <p>Simular</p>
                            </div> 
                        </a>
                    </div>
                </div>
                <div class="container__rows">
                    <div class="container__rows--option">
                        <a href="index.php?ruta=compras_VI/verCompras" class="link__columnTwo">
                            <div class="container__rows--optionLink">
                                <p>Comprar</p>
                            </div>
                        </a>
                    </div>
                    <div class="container__rows--option">
                        <a data-toggle="modal" data-target="#ventana_modal_actualizar" onclick="generarCodigo('<?php echo $pers_puntos;?>','<?php echo $_SESSION['documento'];?>');" class="link__columnTwo" style="cursor: pointer;">
                            <div class="container__rows--optionLink">
                                <p>Generar Código</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card" id="generarCodigoModal"></div>
            <div class="footer">
                <div class="footer__option footer--networks">
                    <span>Redes sociales</span>
                    <i class="fab fa-facebook-square" style="font-size: 30px;"></i>
                    <i class="fab fa-instagram" style="font-size: 30px;"></i>
                </div>
                <div class="footer__option">
                    <span>Contacto</span>
                    <span><span class="material-icons footer__option--phone">phone</span><span>3220000000</span></span>
                    <span><span class="material-icons">email</span><span class="footer__option--email">prueba@gma.com</span></span>
                </div>
                <div class="footer__option">
                    <span>Ubicación</span>
                </div>
            </div>
        </div>
        <!-- ./wrapper -->
        <script src="view/inicio.js"></script>
        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- Toastr -->
        <script src="plugins/toastr/toastr.min.js"></script>
        <script>
            function salir()
            {
                $.post('accesos_CO/salir',function()
                {
                    location.href="index.php";
                });
            }
            function generarCodigo(pers_puntos,doc_cliente)
            {
                const  generateRandomString = (num) => {
                    const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                    let result1= Math.random().toString(36).substring(0,num);       
                    return result1;
                }
                let aleatorio = generateRandomString(7)
                if(pers_puntos >= 100)
                {
                    document.querySelector('#generarCodigoModal').innerHTML=`
                    <div class="modal" id="ventana_modal_actualizar">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content">
                            <div class="card-body">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <form id="formulario_generar_codigo">
                                    <p style="font-size: 18px;">Su c&oacute;digo es: <spam><b>${aleatorio}</b></spam></p>
                                    <input type="hidden" name="doc_cliente" value="${doc_cliente}">
                                    <input type="hidden" name="pers_puntos" value="${pers_puntos}">
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>`
                    let cadena = new FormData(document.querySelector('#formulario_generar_codigo'))
                    fetch('codigos_CO/generarCodigo', {
                    method: 'POST',
                    body: cadena
                    })
                    .then(res => res.json())
                    .then(res=> {
                        if(res.estado=='EXITO')
                        {
                            let puntos_actualiazados=res.puntos
                            let datos=`<li id="datos_cliente" class="header__elements"><?php echo $pers_nombres. ' ';?>${puntos_actualiazados} Puntos</li>`
                            document.querySelector('#datos_cliente').innerHTML=datos
                            toastr.success(res.mensaje);
                        }
                        else if(res.estado=='ERROR')
                        {
                            toastr.error(res.mensaje);
                        }    
                    });
                }
                else
                {
                    document.querySelector('#generarCodigoModal').innerHTML=`
                    <div class="modal" id="ventana_modal_actualizar">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="card-body">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <p>No cuenta con los puntos suficiente para generar un c&oacute;digo</p>    
                            </div>
                        </div>
                        </div>
                    </div>`
                }    
            }
        </script>
        </body>
        </html>
        <?php
    }
}
?>