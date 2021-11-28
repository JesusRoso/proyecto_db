<?php
class recicladores_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/recicladores_MO.php";
        $conexion=new conexion();
        $recicladores_MO=new recicladores_MO($conexion);
        $arreglo_recicladores=$recicladores_MO->seleccionar();
        ?>
        <div class="card">
        <div class="card-header">
            Agregar reciclador
        </div>
        <div class="card-body">
            <form id="formulario_agregar_recicladores">
                <div class="form-group">
                    <label for="nombres_reciclador">Nombres</label>
                    <input type="text" class="form-control" id="nombres_reciclador" name="nombres_reciclador">
                </div>
                <div class="form-group">
                    <label for="apellidos_reciclador">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos_reciclador" name="apellidos_reciclador">
                </div>
                <div class="form-group">
                    <label for="documento_reciclador">N&uacute;mero de documento</label>
                    <input type="text" class="form-control" id="documento_reciclador" name="documento_reciclador">
                </div>
                <div class="form-group">
                    <label for="fnacimiento_reciclador">Fecha de nacimiento</label>
                    <input type="date" class="options options--date" id="fnacimiento_reciclador" name="fnacimiento_reciclador">
                </div>
                <div class="form-group">
                    <label for="ncontacto_reciclador">N&uacute;mero de contacto</label>
                    <input type="text" class="form-control" id="ncontacto_reciclador" name="ncontacto_reciclador">
                </div>
                
                <div class="form-group">
                    <label for="correo_reciclador">Correo electr&oacute;nico</label>
                    <input type="text" class="form-control" id="correo_reciclador" name="correo_reciclador">
                </div>
                <div class="form-group">
                    <label for="clave_reciclador">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="clave_reciclador" name="clave_reciclador">
                </div>
                <div class="form-group">
                    <label for="codigo_reciclador">C&oacute;digo de reciclador</label>
                    <input type="text" class="form-control" id="codigo_reciclador" name="codigo_reciclador">
                </div>
                <div>
                    <label for="ciudad_reciclador">Ciudad de vivienda</label>
                    <select name="ciudad_reciclador" id="ciudad_reciclador" class="options options--city ">
                        <option value="" disabled selected>Elija una opción</option>
                        <option value="498">Oca&ntilde;a</option>
                        <option value="003">Abrego</option>
                        <option value="800">Teorama</option>
                    </select>
                </div>
                <button type="button" onclick="agregarRecicladores();" class="btn btn-primary float-right">Agregar</button>
            </form>
        </div>
        </div>

        <div class="card">
        <div class="card-header">
            Listar  recicladores
            <button type="button" onclick="listarRecicladores();" class="btn btn-primary float-right">Listar</button>
        </div>
        <div class="card-body" id="listar_recicladores" style="display:none;">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody id="lista_recicladores">
                <?php
                foreach($arreglo_recicladores as $objeto_recicladores)
                {
                    $documento_reciclador=$objeto_recicladores->documento;
                    $nombre_reciclador=$objeto_recicladores->nombres;
                    $reciclador_apellidos=$objeto_recicladores->apellidos;
                    $reciclador_correo=$objeto_recicladores->correo_electronico;
                    ?>
                    <tr>
                        <td><?php echo $documento_reciclador;?></td>
                        <td><?php echo $nombre_reciclador.' '.$reciclador_apellidos;?></td>
                        <td id="reciclador_correo_<?php echo $documento_reciclador;?>"><?php echo $reciclador_correo;?></td>
                        <td ><i style="cursor:pointer;" data-toggle="modal" data-target="#ventana_modal" class="fas fa-pen-alt" onclick="verActualizarRecicladores('<?php echo $documento_reciclador;?>','<?php echo $reciclador_correo;?>');"></i></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            </table>
        </div>
        </div>

        <script>
            function listarRecicladores()
            {
                const listar_recicladores=document.getElementById('listar_recicladores');
                if(listar_recicladores.style.display=="none")
                {
                    listar_recicladores.style.display="block";
                }
                else
                {
                    listar_recicladores.style.display="none";
                }
                
            }

            function verActualizarRecicladores(doc_reciclador,correo_reciclador){
                document.querySelector('#prueba').innerHTML=`
                <div class="modal" id="ventana_modal">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="card-body">
                            <form id="formulario_actualizar_recicladores">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <div class="form-group">
                                <label for="correo_nuevo">Correo electr&oacute;nico</label>
                                <input type="text" class="form-control" id="correo_nuevo" name="correo_nuevo" value="${correo_reciclador}">
                            </div>
                            <div class="form-group">
                                <label for="ciudad_reciclador">Ciudad de vivienda</label>
                                <select name="ciudad_reciclador" id="ciudad_reciclador" class="options options--city">
                                    <option value="" disabled selected>Elija una opción</option>
                                    <option value="498">Oca&ntilde;a</option>
                                    <option value="003">Abrego</option>
                                    <option value="800">Teorama</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="numero_contacto_nuevo">N&uacute;mero de contacto</label>
                                <input type="text" class="form-control" id="numero_contacto_nuevo" name="numero_contacto_nuevo">
                            </div>
                            <input type="hidden" name="doc_reciclador" value="${doc_reciclador}">
                            <button type="button" class="btn btn-primary float-right" onclick="actualizarRecicladores('${doc_reciclador}')">Actualizar</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>`
            }
            function actualizarRecicladores(doc_reciclador)
            {
                let cadena = new FormData(document.querySelector('#formulario_actualizar_recicladores'))
                fetch('recicladores_CO/actualizarRecicladores', {
                method: 'POST',
                body: cadena
                })
                .then(res => res.json())
                .then(res=> {
                    let correo_reciclador=$('#correo_nuevo').val();
                    if(res.estado=='EXITO')
                    {
                        document.querySelector('#reciclador_correo_'+doc_reciclador).innerHTML=correo_reciclador;
                        toastr.success(res.mensaje);
                    }
                    else if(res.estado=='ERROR')
                    {
                        toastr.error(res.mensaje);
                    }
                    
                });
            }   
            function agregarRecicladores()
            {
                let cadena = new FormData(document.querySelector('#formulario_agregar_recicladores'))
                fetch('recicladores_CO/agregar', {
                method: 'POST',
                body: cadena
                })
                .then(res => res.json())
                .then(res=> {
                    let doc_reciclador=res.doc_reciclador;
                    let nombres_reciclador=$('#nombres_reciclador').val();
                    let apellidos_reciclador=$('#apellidos_reciclador').val();
                    let correo_reciclador=$('#correo_reciclador').val();
                    if(res.mensaje=='EXITO')
                    {
                        let fila= `
                        <tr>
                            <td>${doc_reciclador}</td>
                            <td>${nombres_reciclador} ${apellidos_reciclador}</td>
                            <td id="reciclador_correo_${doc_reciclador}">${correo_reciclador}</td>
                            <td ><i style="cursor:pointer;" class="fas fa-pen-alt" data-toggle="modal" data-target="#ventana_modal" onclick="verActualizarRecicladores('${doc_reciclador}','${correo_reciclador}');"></i></td>
                        </tr>
                        `;
                        $('#lista_recicladores').prepend(fila);
                        document.querySelector('#formulario_agregar_recicladores').reset();
                        toastr.success('Registro exitoso');
                    }
                    else
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