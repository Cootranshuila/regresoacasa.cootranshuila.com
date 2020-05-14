$(document).ready(function () {
    if (window.location.pathname == '/dashboard/programacion-viaje' || window.location.pathname == '/dashboard/programacion-viaje/get-ciudades') {
        ciudadOrigen();
        ciudadDestino();
    }
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
            $("#modal-blade").modal('show')
            $('#modal-blade-title').text('Programación de viaje N° '+data.solicitud[0].id)
            $('#modal-blade-body').html(`
                <div class="print-viaje m-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <address>
                                        <strong>Cliente:</strong><br>
                                        Nombre<br>
                                        tipo de cedula: cedula<br>
                                        Telefono<br>
                                        Correo<br>
                                        Dir Origen
                                    </address>
                                </div>
                                <div class="col-12">
                                    <address>
                                        <strong>Menor de Edad:</strong><br>
                                        Si - No<br>
                                        Edad<br>
                                        file registro
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 m-t-30">
                                    <address>
                                        <strong>Tipo de Excepcion:</strong><br>
                                        excepcion<br>
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
                                                    <td class="text-center">$10.99</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right"><a href="#" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-link"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none row my-5">
                                        <div class="float-left">
                                            <a href="#" class="btn btn-light waves-effect waves-light">Certificado lugar de residencia <i class="mdi mdi-download"></i></a>
                                            <a href="#" class="btn btn-light waves-effect waves-light">Declaración Juramentada <i class="mdi mdi-download"></i></a>
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
            `)
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