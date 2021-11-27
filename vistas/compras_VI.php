<?php
class compras_VI
{
    function __construct(){}
    function verCompras()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Compras</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link rel="stylesheet" href="view/styleHeader.css">
        <style>
            .content-wrapper{
                margin: 0;
            }
            .product-image{
                width: 70%;
            }
            .input{
                height: 30px;
            }
            .row{
                text-align: center;
            }
            .total-compra{
                margin-top: 100px;
                margin-bottom: 30px;
            }
            .button{
                margin: 0 auto;
            }
            .info-camisa, .info-zapato, .info-pantalon, .info-gorra{
                display: none;
            }
        </style>
        </head>
        <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <div class="header">
                <ul class="header__list" id="header__list">
                    <li class="header__elements header__element--one"><a href="index.php">Inicio</a></li>
                    <li class="header__elements">User</li>
                    <li class="header__elements header__element--three">Cerrar Sesi&oacute;n</li>
                </ul>
                <a class="header__menu-squared" ><img id="menu-squared" src="https://img.icons8.com/ios/50/000000/menu-squared-2--v1.png"/></a>
            </div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin: 0;">
        <form action="">       
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>E-commerce</h1>
                </div>
                </div>
            </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">Camisa</h3>
                        <div class="col-10">
                            <img src="dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                        </div>
                        </div>
                        <div class="col-12 col-sm-6">
                        <h3 class="my-3">Camisa</h3>
                        <hr>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                            500 Puntos
                            </h2>
                        </div>
                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat" id="btn-agg-camisa">
                            <option name="camisa" value="1" id="">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                            </option>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </section>
            <!-- /.content -->
            <!-- Content 2-->
            <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">Pantalon</h3>
                        <div class="col-10">
                            <img src="dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                        </div>
                        </div>
                        <div class="col-12 col-sm-6">
                        <h3 class="my-3">Pantalon</h3>
                        <hr>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                            500 Puntos
                            </h2>
                        </div>
                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat" id="btn-agg-pantalon">
                            <option name="pantalon" value="2" id="">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                            </option>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </section>
            <!-- /.content 2-->
            <!-- Content 3-->
            <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">Gorra</h3>
                    <div class="col-10">
                        <img src="dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                    <h3 class="my-3">Gorra</h3>
                    <hr>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                        500 Puntos
                        </h2>
                    </div>
                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat" id="btn-agg-gorra">
                        <option name="gorra" value="3" id="">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Add to Cart
                        </option>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </section>
            <!-- /.content 3-->
            <!-- Content 4-->
            <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">Zapatos</h3>
                        <div class="col-10">
                            <img src="dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                        </div>
                        </div>
                        <div class="col-12 col-sm-6">
                        <h3 class="my-3">Zapatos</h3>
                        <hr>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                            500 Puntos
                            </h2>
                        </div>
                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat" id="btn-agg-zapato">
                            <option name="zapato" value="5" id="prue">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                            </option>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </section>
            <!-- /.content 4-->
        </form>    
        </div>
        <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->
        <div class="wrapper" >
            <div class="content-wrapper" style="margin: 0;">
            <div class="content">
                <div class="row">
                    <div class="col-4 col-sm-2"><h4>Producto</h4></div>
                    <div class="col-4 col-sm-3"><h4>Precio</h4></div>
                    <div class="col-4 col-sm-2"><h4>Cantidad</h4></div>
                    <div class="col-4 col-sm-3"><h4>Total</h4></div>
                </div>
                <div class="row info-camisa" id="info-camisa">
                    <p class="col-4 col-sm-2">Camisa</p>
                    <p class="col-4 col-sm-3">500</p>
                    <input type="number" class="col-4 col-sm-2 input" id="cant-camisa">
                    <p class="col-4 col-sm-3 total__puntos-camisa">500</p>
                    <i class="fas fa-times col-sm-2" id="cerrar-info-camisa"></i>
                </div>
                <div class="row info-pantalon" id="info-pantalon">
                    <p class="col-4 col-sm-2">Pantalon</p>
                    <p class="col-4 col-sm-3">500</p>
                    <input type="number" class="col-4 col-sm-2 input" id="cant-pantalon">
                    <p class="col-4 col-sm-3 total__puntos-pantalon">500</p>
                    <i class="fas fa-times col-sm-2" id="cerrar-info-pantalon"></i>
                </div>
                <div class="row info-gorra" id="info-gorra">
                    <p class="col-4 col-sm-2">Gorra</p>
                    <p class="col-4 col-sm-3">500</p>
                    <input type="number" class="col-4 col-sm-2 input" id="cant-gorra">
                    <p class="col-4 col-sm-3 total__puntos-gorra">500</p>
                    <i class="fas fa-times col-sm-2" id="cerrar-info-gorra"></i>
                </div>
                <div class="row info-zapato" id="info-zapato">
                    <p class="col-4 col-sm-2">Zapatos</p>
                    <p class="col-4 col-sm-3">500</p>
                    <input type="number" class="col-4 col-sm-2 input" id="cant-zapato">
                    <p class="col-4 col-sm-3 total__puntos-zapato">500</p>
                    <i class="fas fa-times col-sm-2" id="cerrar-info-zapato"></i>
                </div>
                <div class="row total-compra">
                    <div class="col-sm-9">
                    <label>Ingrese direccion de destino del producto</label>
                    <input type="text">
                    </div>
                    <p class="col-sm-3">Total puntos <span id="total-valor-puntos">0</span></p>
                    
                </div>
                <div class="row">
                    <input type="button" value="Comprar" class="col-sm-2 button">
                </div>
            </div>
            </div>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <script src="view/compras.js"></script>
        <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
            })
        })
        
         
        </script>
        </body>
        </html>
        <?php
        
    }
}
?>