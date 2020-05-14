$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function verSolicitud(id) {
    $.ajax({
        url: '/dashboard/programacion-viaje/'+id,
        type: 'GET',
        success: function (data) {
            $("#modal-blade").modal('show')
            $('#modal-blade-title').text('Programación de viaje N° '+data.solicitud[0].id)
            // $('#modal-blade-body').text('Nombre: '+data.correo.nombre_usu+' Teléfono: '+data.correo.telefono_usu)
        }
    });
    return false;
}
