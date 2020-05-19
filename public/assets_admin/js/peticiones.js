$(document).ready(function () {
    if (window.location.pathname == '/dashboard/programacion-viaje' || window.location.pathname == '/dashboard/programacion-viaje/get-ciudades') {
        ciudadOrigen();
        ciudadDestino();
    }

    $("#modal-blade").on("hidden.bs.modal", function () {
        location.reload();
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function verSolicitud(id) {
    $.ajax({
        url: '/dashboard/'+id+'/programacion-viaje',
        type: 'GET',
        success: function (data) {
            console.log(data)
            $("#modal-blade").modal('show')
            $('#modal-blade-title').text('Programación de viaje N° '+data.solicitud[0].id)
            var modal_content = `
                <div class="print-viaje m-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <address>
                                        <strong>Cliente:</strong><br>
                                        `+data.solicitud[0].name+`<br>
                                        `+data.solicitud[0].tipo_identificacion+`: `+data.solicitud[0].numero_identificacion+`<br>
                                        `+data.solicitud[0].telefono+`<br>
                                        `+data.solicitud[0].email+`<br>
                                        `+data.solicitud[0].dir_actual+`
                                    </address>
                                </div>
                                <div class="col-12">
                                    <address>
                                        <strong>Menor de Edad:</strong><br>
                                        `+data.solicitud[0].menor_edad+`<br>
                                        `;
                                        if (data.solicitud[0].menor_edad == 'Si') {
                                            modal_content += `
                                            Edad: `+data.solicitud[0].edad_del_menor+`<br>
                                            <a href="/storage/imagenes/certificados/`+data.solicitud[0].file_registro_civil+`" target="_blank" class="btn btn-light waves-effect waves-light">Registro Civil <i class="mdi mdi-download"></i></a>`
                                        } 
                                        modal_content += `
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 m-t-30">
                                    <address>
                                        <strong>Tipo de Excepcion:</strong><br>
                                        `+data.solicitud[0].tipo_excepcion+`<br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <div class="p-2">
                                    <h3 class="font-16"><strong>Ruta Viaje</strong></h3>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td><strong>#</strong></td>
                                                    <td class="text-center"><strong>Origen</strong></td>
                                                    <td class="text-center"><strong>Destino</strong></td>
                                                    <td class="text-center"><strong>Dir. Destino</strong></td>
                                                    <td class="text-right"><strong><i class="mdi mdi-settings"></i></strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                <tr>
                                                    <td>1</td>
                                                    <td class="text-center">`+data.solicitud[0].ciudad_origen+`</td>
                                                    <td class="text-center">`+data.solicitud[0].ciudad_destino+`</td>
                                                    <td class="text-center">`+data.solicitud[0].dir_destino+`</td>
                                                    <td class="text-right"><a href="#" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-link"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none row my-5">
                                        <div class="float-left">
                                            <a href="/storage/imagenes/certificados/`+data.solicitud[0].file_certificado+`" target="_blank" class="btn btn-light waves-effect waves-light">Certificado lugar de residencia <i class="mdi mdi-download"></i></a>
                                            <a href="/storage/docs/solicitud/`+data.solicitud[0].file_solicitud+`" target="_blank" class="btn btn-light waves-effect waves-light">Declaración Juramentada <i class="mdi mdi-download"></i></a>
                                        </div>
                                    </div>

                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            `;
            $('#modal-blade-body').html(modal_content)
        }
    });
    return false;
}

function ciudadOrigen() {
    var html = '<option value="">Ciudad Origen</option>';
    $.ajax({
        url: '/get-origen',
        type: 'GET',
        success: function (data) {
            var origenes = data.origenes
            origenes.forEach(origen => {
                html += '<option value="'+origen.ciudad_origen+'">'+origen.ciudad_origen+'</option>';
            });
            $('#ciudad_origen').html(html)
        }
    })
}

function ciudadDestino() {
    var html = '<option value="">Ciudad Destino</option>';
    $.ajax({
        url: '/get-destino',
        type: 'GET',
        success: function (data) {
            var destinos = data.destinos
            destinos.forEach(destino => {
                html += '<option value="'+destino.ciudad_destino+'">'+destino.ciudad_destino+'</option>';
            });
            $('#ciudad_destino').html(html)
        }
    })
}