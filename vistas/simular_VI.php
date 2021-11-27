<?php
class simular_VI
{
    function __construct(){}

    function verSimular()
    {   
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="view/styleHeader.css">
            <link rel="stylesheet" href="view/styleFooter.css">
            <link rel="stylesheet" href="view/styleSimulate.css">
            <!-- Font Awesome Icons -->
            <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css">    
            <title>Simular</title>
        </head>
        <body>
            <div class="general">
                <div class="header">
                    <ul class="header__list" id="header__list">
                        <li class="header__elements header__element--one"><a href="index.php">Inicio</a></li>
                        <li class="header__elements">User</li>
                        <li class="header__elements header__element--three">Cerrar Sesión</li>
                    </ul>
                    <a class="header__menu-squared" ><img id="menu-squared" src="https://img.icons8.com/ios/50/000000/menu-squared-2--v1.png"/></a>
                </div>
                <div class="container">
                    <div class="container__material container__structure">
                        <h3 class="container__titles">Material</h3>
                        <img src="view/img/img_celular.jpeg" class="container__img" alt="">
                        <img src="view/img/img_carton.jpeg" class="container__img" alt="">
                        <img src="view/img/img_latas.jpeg" class="container__img" alt="">
                        <img src="view/img/img_plastico.jpeg" class="container__img" alt="">
                        <img src="view/img/img_vidrios.jpeg" class="container__img" alt="">
                    </div>
                    <div class="container__units container__structure">
                        <h3 class="container__titles">Unidades</h3>
                        <span><label for="" class="container__parraf-units">Unidades</label><input type="number" class="container__inputs" id="phone"></span>
                        <span><label for="" class="container__parraf-units">Unidades</label><input type="number" class="container__inputs" id="carton"></span>
                        <span><label for="" class="container__parraf-units">Unidades</label><input type="number" class="container__inputs" id="latas"></span>
                        <span><label for="" class="container__parraf-units">Unidades</label><input type="number" class="container__inputs" id="plastico"></span>
                        <span><label for="" class="container__parraf-units">Unidades</label><input type="number" class="container__inputs" id="vidrio"></span>
                    </div>
                    <div class="container__points container__structure">
                        <h3 class="container__titles">Equivalente a puntos</h3>
                        <span class="container__text-points" id="phone_point"></span>
                        <span class="container__text-points"></span>
                        <span class="container__text-points"></span>
                        <span class="container__text-points"></span>
                        <span class="container__text-points"></span>
                    </div>
                    <button class="container__button" id="button_simular">Simular</button>
                    <span class="container__total-points"></span>
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
        <script src="view/inicio.js"></script>
        <script>
            const button_simular = document.getElementById('button_simular')
            let total_points_text = document.querySelector('.container__total-points')
            const VALUE_POINTS=10;
            let total_points=0

            let inputs  = [] 
            inputs = document.querySelectorAll('.container__inputs')
            let text_points = []
            text_points=document.querySelectorAll('.container__text-points')
            button_simular.addEventListener('click',()=>{
                for(let i=0; i<5;i++){
                    text_points[i].textContent = (inputs[i].value)*VALUE_POINTS
                    total_points += (inputs[i].value)*VALUE_POINTS
                }
                total_points_text.textContent = "Total: "+total_points
                total_points=0
                console.log(total_points)
            })
        </script>
        </body>
        </html>
        <?php
    }
}
?>