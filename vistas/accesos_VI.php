<?php
class accesos_VI
{
    function __construct(){}
    function iniciarSesion()//function con lowercamelcase
    {
        ?>
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="view/styleFormularios.css">
                <title>Login</title>
            </head>
            <body>
                <div class="container">
                    <span id="icon" class="material-icons">account_circle</span>
                    
                    <form action="index.php" method="post">
                        <div class="container__element">
                            <label for="">Correo</label>
                            <input type="text" name="usuario">
                        </div>
                        <div class="container__element">
                            <label for="">Contraseña</label>
                            <input type="password" name="clave">
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Mostrar contraseña</label>
                        </div>
                        <div class="elementButton container__element"><button type="submit">Ingresar</button></div>
                        <p>¿No estas registrado? Hazlo aquí</p>
                        <div class="elementButton container__element"><a href="index.php?opcion=registrarse" ><button type="button">Registrar</button></a></div>
                        <div class="elementButton container__element"><a href="#" ><button type="button">Saber más</button></a></div>
                    </form>
                </div>
            </body>
            </html>
        <?php
    }
}
?>