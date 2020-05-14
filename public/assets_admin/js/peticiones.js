$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function verPQR(id) {
    $.ajax({
        url: '/dashboard/pqr/'+id,
        type: 'GET',
        success: function (data) {
            $("#modal-blade").modal('show')
            $('#modal-blade-title').text('Correo N° '+data.correo.num_correo)
            $('#modal-blade-body').text('Nombre: '+data.correo.nombre_usu+' Teléfono: '+data.correo.telefono_usu)
        }
    });
    return false;
}

// window.addEventListener("load",function(){
//     document.getElementById("texto").addEventListener("keyup",function(){
//         fetch('/dashboard/pqr/buscador?text=${document.getElementById("texto").value}',{
//             method:'get'
//         })
//          .then(Response=>Response.text())
//          .then(html=>{
//              document.getElementById("Resultados").innerHTML +=html
//          })
//     })
// })


$(document).ready(function(){

    switch (window.location.pathname) {
        case '/dashboard/pqr/correos':
            var tipo = 'Correo';
            break;
        case '/dashboard/pqr/reclamos':
            var tipo = 'Reclamo';
            break;
        case '/dashboard/pqr/quejas':
            var tipo = 'Queja';
            break;
        case '/dashboard/pqr/sugerencias':
            var tipo = 'Sugerencia';
            break;
        default:

            break;
    }

    var html = '';

    // Iniciador de TEXAREA para contestar los correos
    CKEDITOR.replace("editor1",{
        height:"200px"
    });

    // Peticion AJAX para listar la tabla de correos
    $.ajax({
        url: '/dashboard/pqr/'+tipo,
        type: 'POST',
        data: { tipo:tipo },
        success: function (data) {
            // console.log(Object.values(data))
            html = `
                    <div class="table-responsive mb-3">
                        <table class="table table-centered table-hover table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th colspan="12" class="text-center">
                                    <div class="d-inline-block icons-sm mr-2"><i class="fas fa-envelope-open-text"></i></div>
                                        <span class="header-title mt-2">Correos enviados desde la página web</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Mensaje</th>
                                    <th scope="col" width="120px">Fecha</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            `
                            Object.values(data.correos).forEach(correo => {
                                html += `
                                    <tr>
                                        <th scope="row">
                                            <a href="#">${ correo.num_reclamo }</a>
                                        </th>
                                        <td>${ correo.clasificacion }</td>
                                        <td>${ correo.num_reclamo }</td>
                                        <td>${ correo.num_reclamo }</td>    
                                        <td>${ correo.num_reclamo }</td>
                                        <td>${ correo.num_reclamo }</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="verPQR({{ $correo->num_correo }})" data-toggle="tooltip" data-placement="top" title="Ver Correo">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                `
                            });
                            html += `        
                            </tbody>
                        </table>
                    </div>
                `;
            
            $('#tabla-correos').html(html);
        }
    });

});