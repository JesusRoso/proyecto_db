<?php
class clientes_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/clientes_MO.php";
        $conexion=new conexion();
        $clientes_MO=new clientes_MO($conexion);
        $arreglo_clientes=$clientes_MO->seleccionar();
        ?>
        <div class="card">
        <div class="card-header">
            Listar  clientes
            <button type="button" onclick="listarClientes();" class="btn btn-primary float-right">Listar</button>
        </div>
        <div class="card-body" id="listar_clientes" style="display:none;">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Correo electr&oacute;nico</th>
                    <th scope="col">Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody id="lista_clientes">
                <?php
                foreach($arreglo_clientes as $objeto_clientes)
                {
                    $documento_cliente=$objeto_clientes->documento;
                    $cliente_nombre=$objeto_clientes->nombres;
                    $cliente_apellidos=$objeto_clientes->apellidos;
                    $cliente_correo=$objeto_clientes->correo_electronico;
                    $arreglo_clientes2=$clientes_MO->seleccionarPuntos($documento_cliente);
                    foreach($arreglo_clientes2 as $objeto_clientes2)
                    {
                        $total_puntos=$objeto_clientes2->total_puntos;
                        $numero_contacto_cliente=$objeto_clientes2->numero_contacto;
                    }
                    ?>
                    <tr>
                        <td><?php echo $documento_cliente;?></td>
                        <td><?php echo $cliente_nombre.' '.$cliente_apellidos;?></td>
                        <td id="cliente_correo_<?php echo $documento_cliente;?>"><?php echo $cliente_correo;?></td>
                        <td><i style="cursor:pointer;" class="fas fa-pen-alt" data-toggle="modal" data-target="#ventana_modal_actualizar" onclick="verActualizarClientes('<?php echo $documento_cliente;?>','<?php echo $total_puntos;?>','<?php echo $cliente_correo;?>','<?php echo $numero_contacto_cliente;?>');"></i></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            </table>
        </div>
        </div>
        <script>
            function listarClientes()
            {
                const listar_clientes=document.getElementById('listar_clientes');
                if(listar_clientes.style.display=='none')
                {
                    listar_clientes.style.display="block";
                }
                else
                {
                    listar_clientes.style.display="none";
                }
            }
            function verActualizarClientes(doc_cliente,total_puntos,correo_cliente,numero_contacto_cliente)
            {
                document.querySelector('#clientesModal').innerHTML=`
                <div class="modal" id="ventana_modal_actualizar">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="card-body">
                            <form id="formulario_actualizar_clientes">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <div class="form-group">
                                <label for="correo_nuevo">Correo electr&oacute;nico</label>
                                <input type="text" class="form-control" id="correo_nuevo" name="correo_nuevo" value="${correo_cliente}">
                            </div>
                            <div class="form-group">
                                <label for="numero_contacto_nuevo">N&uacute;mero de contacto</label>
                                <input type="text" class="form-control" id="numero_contacto_nuevo" name="numero_contacto_nuevo" value="${numero_contacto_cliente}">
                            </div>
                            <div class="form-group">
                                <label for="puntos_acumulados">Puntos acumulados</label>
                                <input type="number" class="form-control" id="puntos_acumulados" name="puntos_acumulados" value="${total_puntos}">
                            </div>
                            <input type="hidden" name="doc_cliente" value="${doc_cliente}">
                            <input type="hidden" name="total_puntos_acumulados" value="${total_puntos}">
                            <button type="button" class="btn btn-primary float-right" onclick="actualizarClientes('${doc_cliente}')">Actualizar</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>`
            }   
            function actualizarClientes(doc_cliente)
            {
                let cadena = new FormData(document.querySelector('#formulario_actualizar_clientes'))
                fetch('clientes_CO/actualizarClientes', {
                method: 'POST',
                body: cadena
                })
                .then(res => res.json())
                .then(res=> {
                    let correo_cliente=$('#correo_nuevo').val();
                    if(res.estado=='EXITO')
                    {
                        document.querySelector('#cliente_correo_'+doc_cliente).innerHTML=correo_cliente;
                        toastr.success(res.mensaje);
                    }
                    else if(res.estado=='ERROR')
                    {
                        toastr.error(res.mensaje);
                    }
                    
                });
            }
        </script>
        <?php
    }
}
?>