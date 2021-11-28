<?php
class registros_VI
{
    function __construct(){}
    function verRegistro()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="view/styleFormularios.css">
            <title>Registro</title>
        </head>
        <body>
            <div class="container">
                <form action="index.php" method="POST">
                    <span>
                        <p>Registro</p>
                    </span>
                    <div class="container__element">
                        <label for="">Nombres</label>
                        <input type="text" name="nombres" required>        
                    </div>
                    <div class="container__element">
                        <label for="">Apellidos</label>
                        <input type="text" name="apellidos" required>
                    </div>
                    <div class="container__element">
                        <label for="">Número de documento</label>
                        <input type="text" name="numero_documento" required>
                    </div>
                    <div class="container__element">
                        <label for="">Correo electrónico</label>
                        <input type="text" name="correo_electronico" required>
                    </div>
                    <div class="container__element">
                        <label for="">Número de contacto</label>
                        <input type="text" name="numero_contacto" required>
                    </div>
                    <div class="container__element">
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" name="fecha_nacimiento" required>
                    </div>
                    <div class="container__element">
                        <label for="">Contraseña</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="elementButton container__element"><button type="submit">Registrar</button></div>
                    <a href="index.php">Iniciar Sesion</a>
                </form>
            </div> 
        </body>
        </html>
        <?php
        
    }
}
?>