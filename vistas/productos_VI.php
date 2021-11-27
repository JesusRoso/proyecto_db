<?php
class productos_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/productos_MO.php";
        $conexion=new conexion();
        $productos_MO=new productos_MO($conexion);
        $arreglo_productos=$productos_MO->seleccionar();
        ?>
        <div class="card">
        <div class="card-header">
            Agregar productos
        </div>
        <div class="card-body">
            <form id="formulario_agregar_productos">
                <div class="form-group">
                    <label for="codigo_producto">C&oacute;digo producto</label>
                    <input type="text" class="form-control" id="codigo_producto" name="codigo_producto">
                </div>
                <div class="form-group">
                    <label for="nombres_producto">Nombre producto</label>
                    <input type="text" class="form-control" id="nombres_producto" name="nombres_producto">
                </div>
                <div class="form-group">
                    <label for="puntos_producto">Valor en puntos</label>
                    <input type="number" class="form-control" id="puntos_producto" name="puntos_producto">
                </div>
                <button type="button" onclick="agregarProductos();" class="btn btn-primary float-right">Agregar</button>
            </form>
        </div>
        </div>

        <div class="modal" id="ventana_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="titulo_modal"></div>
                    <div class="modal-body" id="contenido_modal"></div>
                </div>
            </div>  
        </div>

        <div class="card">
        <div class="card-header">
            Lista de productos
            <button type="button" onclick="listarProductos();" class="btn btn-primary float-right">Listar</button>
        </div>
        <div class="card-body" id="listar_productos" style="display:none;">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Valor en puntos</th>
                    <th scope="col">Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody id="lista_productos">
                <?php
                foreach($arreglo_productos as $objeto_productos)
                {
                    $productos_id=$objeto_productos->cod_producto;
                    $nombre_producto=$objeto_productos->nombre_producto;
                    $puntos_producto=$objeto_productos->puntos_producto;
                    ?>
                    <tr id="fila<?php echo $productos_id;?>">
                        <td id="producto_nombre_<?php echo $productos_id;?>"><?php echo $nombre_producto;?></td>
                        <td id="producto_puntos_<?php echo $productos_id;?>"><?php echo $puntos_producto;?></td>
                        <td>
                            <i style="cursor:pointer;" class="fas fa-pen-alt" data-toggle="modal" data-target="#ventana_modal_actualizar" onclick="verActualizarProductos('<?php echo $productos_id;?>','<?php echo $nombre_producto;?>');"></i>
                            <button style="margin-left: 15px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#ventana_modal" onclick="confirmarEliminar('<?php echo $productos_id;?>')">Desactivar</button>    
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            </table>
        </div>
        </div>
        <script>
            function listarProductos()
            {
                const listar_productos=document.getElementById('listar_productos');
                if(listar_productos.style.display=="none")
                {
                    listar_productos.style.display="block";
                }
                else
                {
                    listar_productos.style.display="none";
                }
                
            }
            function confirmarEliminar(eliminar)
            {
                let boton = '<button class="close" data-dismiss="modal">&times;</button>'
                document.getElementById('titulo_modal').innerHTML='Confirmar la eliminaci&oacute;n'+boton
                var contenido='¿Desea desactivar el registro?';
                contenido+='<br><br><button type="button" class="btn btn-danger" onclick="eliminar('+eliminar+');">Desactivar</button>';
                document.getElementById('contenido_modal').innerHTML=contenido;
            }
            function eliminar(eliminarProducto){
                $.post('productos_CO/eliminarProducto',{eliminarProducto:eliminarProducto},function(respuesta)
                {
                    if(respuesta=="EXITO")
                    {
                        $('#fila'+eliminarProducto).remove();
                        toastr.success('Eliminado exitosamente');
                    }
                    else
                    {
                        toastr.error(respuesta);
                    }
                });
            }
            function verActualizarProductos(productos_id,productos_nombre)
            {
                document.querySelector('#productosModal').innerHTML=`
                <div class="modal" id="ventana_modal_actualizar">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="card-body">
                            <form id="formulario_actualizar_productos">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <div class="form-group">
                                <label for="nombre_nuevo">Nombre producto</label>
                                <input type="text" class="form-control" id="nombre_nuevo" name="nombre_nuevo" value="${productos_nombre}">
                            </div>
                            <div class="form-group">
                                <label for="puntos_nuevo">Puntos producto</label>
                                <input type="number" class="form-control" id="puntos_nuevo" name="puntos_nuevo">
                            </div>
                            <input type="hidden" name="productos_id" value="${productos_id}">
                            <button type="button" class="btn btn-primary float-right" onclick="actualizarProductos('${productos_id}')">Actualizar</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>`
            }
            function actualizarProductos($productos_id)
            {
                let cadena = new FormData(document.querySelector('#formulario_actualizar_productos'))
                fetch('productos_CO/actualizarProductos', {
                method: 'POST',
                body: cadena
                })
                .then(res => res.json())
                .then(res=> {
                    let nombre_nuevo=$('#nombre_nuevo').val();
                    let puntos_nuevo=$('#puntos_nuevo').val();
                    if(res.estado=='EXITO')
                    {
                        document.querySelector('#producto_nombre_'+$productos_id).innerHTML=nombre_nuevo;
                        document.querySelector('#producto_puntos_'+$productos_id).innerHTML=puntos_nuevo;
                        toastr.success(res.mensaje);
                    }
                    else if(res.estado=='ERROR')
                    {
                        toastr.error(res.mensaje);
                    }
                    
                });
            }
            function agregarProductos()
            {  
                let cadena = new FormData(document.querySelector('#formulario_agregar_productos'))
                fetch('productos_CO/agregar', {
                method: 'POST',
                body: cadena
                })
                .then(res => res.json())
                .then(res=> {
                    let cod_producto=res.cod_producto;
                    let nombres_producto=$('#nombres_producto').val();
                    let puntos_producto=document.querySelector('#formulario_agregar_productos #puntos_producto').value;                   
                    if(res.estado=='EXITO')
                    {
                        let fila= `
                        <tr>
                            <td id="producto_nombre_${cod_producto}">${nombres_producto}</td>
                            <td id="producto_puntos_${cod_producto}">${puntos_producto}</td>
                            <td style="cursor:pointer;"><i class="fas fa-pen-alt" data-toggle="modal" data-target="#ventana_modal_actualizar" onclick="verActualizarProductos(${cod_producto},'${nombres_producto}');"></i>
                            <button style="margin-left: 15px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#ventana_modal" onclick="confirmarEliminar('<?php echo $productos_id;?>')">Eliminar</button>
                            </td>
                             
                        </tr>
                        `;
                        $('#lista_productos').prepend(fila);
                        document.querySelector('#formulario_agregar_productos').reset();
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