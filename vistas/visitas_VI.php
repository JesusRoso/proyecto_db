<?php
class visitas_VI
{
    function __construct(){}

    function verVisitas()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="view/styleVisita.css">
            <link rel="stylesheet" href="view/styleHeader.css">
            <link rel="stylesheet" href="view/styleFooter.css">
            <!-- Font Awesome Icons -->
            <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> 
            
            <title>Solicitar Visita</title>
        </head>
        <body>
            <div class="general" style="background-color: #e9ecef;">
                <div class="header">
                    <ul class="header__list" id="header__list">
                        <li class="header__elements header__element--one"><a href="index.php">Inicio</a></li>
                        <li class="header__elements">User</li>
                        <li class="header__elements header__element--three">Cerrar Sesi&oacute;n</li>
                    </ul>
                    <a class="header__menu-squared" ><img id="menu-squared" src="https://img.icons8.com/ios/50/000000/menu-squared-2--v1.png"/></a>
                </div>
                <div class="container">
                    <h3 class="container__title">Solicitar Visita</h3>
                    <form class="container__form" id="formulario_agregar_visitas">
                        <span>
                            <label for="ciudad_visita" class="form__label">Ciudad</label>
                            <select name="ciudad_visita" id="ciudad_visita" class="options options--city">
                                <option value="" disabled selected>Elija una opción</option>
                                <option value="498">Oca&ntilde;a</option>
                                <option value="003">Abrego</option>
                                <option value="800">Teorama</option>
                            </select>
                        </span>
                        <span><label for="" class="form__label">Direcci&oacute;n </label><input type="text" class="options options--address" name="direccion_visita"></span>
                        <span><label for="" class="form__label">Fecha propuesta</label><input type="date" class="options options--date" name="fecha_visita"></span>
                        
                        <button type="button" onclick="agregarVisita();" class="container__button">Enviar</button>
                    </form>
                </div>
                
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
            <script>
                function agregarVisita()
                {
                    let cadena = new FormData(document.querySelector('#formulario_agregar_visitas'))
                    fetch('visitas_CO/agregar', {
                    method: 'POST',
                    body: cadena
                    })
                    .then(res => res.json())
                    .then(res=> {
                        if(res.mensaje=='EXITO')
                        {
                            alert ('Solicitud registrada');
                        }
                        else
                        {
                            alert (res.mensaje);
                        }
                    });
                }    
            </script>
        </body>
        </html>
        <?php
    }
}
?>