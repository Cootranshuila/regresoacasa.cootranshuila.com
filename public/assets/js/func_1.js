$(document).ready(function () {
    if (window.location.pathname == '/') {
        var html = '<option value="">Departamento</option>';
        $.ajax({
            url: 'https://www.datos.gov.co/resource/xdk5-pm3f.json?$select=departamento&$group=departamento',
            type: 'GET',
            success: function (data) {
                data.forEach(dpt => {
                    html += '<option value="'+dpt.departamento+'">'+dpt.departamento+'</option>';
                });
                $('#departamento_origen').html(html)
                $('#departamento_destino').html(html)
            }
        })
    }

    $('#menor_edad_si').change(function () {
        $('#edad_del_menor').removeClass('d-none').addClass('required')
    })
    $('#menor_edad_no').change(function () {
        $('#edad_del_menor').removeClass('required').addClass('d-none')
    })
})

/*  Wizard */
jQuery(function($) {
    "use strict";
    $('form#wrapped').attr('action', '/registrar-viaje');
    $("#wizard_container").wizard({
        stepsWrapper: "#wrapped",
        submit: ".submit",
        unidirectional: false,
        beforeSelect: function(event, state) {
            if ($('input#website').val().length != 0) {
                return false;
            }
            if (!state.isMovingForward)
                return true;
            var inputs = $(this).wizard('state').step.find(':input');
            return !inputs.length || !!inputs.valid();
        }
    }).validate({
        errorPlacement: function(error, element) {
            if (element.is(':radio') || element.is(':checkbox')){
                error.insertBefore(element.next());
            } else {
                error.insertAfter(element);
            }
        }
    });
    //  progress bar
    $("#progressbar").progressbar();
    $("#wizard_container").wizard({
        afterSelect: function(event, state) {
            $("#progressbar").progressbar("value", state.percentComplete);
            $("#location").text("" + state.stepsComplete + " de " + state.stepsPossible + " completado");
        }
    });
});

$("#wizard_container").wizard({
    transitions: {
        branchtype: function($step, action) {
            var branch = $step.find(":checked").val();
            if (!branch) {
                $("form").valid();
            }
            return branch;
        }
    }
});

/* File upload validate size and file type - For details: https://github.com/snyderp/jquery.validate.file*/
$("form#wrapped")
    .validate({
        rules: {
            imagen: {
                fileType: {
                    types: ["image/png", "image/jpg", "image/jpeg", "application/pdf"]
                },
                maxFileSize: {
                    "unit": "MB",
                    "size": "2"
                },
                minFileSize: {
                    "unit": "KB",
                    "size": "2"
                }
            }
        }
    });

// Input name and email value
function getVals(formControl, controlType) {
    switch (controlType) {

        case 'name_field':
            // Get the value for input
            var value = $(formControl).val();
            $("#name_field").text(value);
            break;

        case 'email_field':
            // Get the value for input
            var value = $(formControl).val();
            $("#email_field").text(value);
            break;
    }
}

function dptOrigen(dpt) {
    var html = '<option value="">Ciudad</option>';
    $.ajax({
        url: 'https://www.datos.gov.co/resource/xdk5-pm3f.json?departamento='+dpt,
        type: 'GET',
        success: function (data) {
            data.forEach(dpt => {
                html += '<option value="'+dpt.municipio+'">'+dpt.municipio+'</option>';
            });
            $('#ciudad_origen').html(html)
        }
    })
}

function dptDestino(dpt) {
    var html = '<option value="">Ciudad</option>';
    $.ajax({
        url: 'https://www.datos.gov.co/resource/xdk5-pm3f.json?departamento='+dpt,
        type: 'GET',
        success: function (data) {
            data.forEach(dpt => {
                html += '<option value="'+dpt.municipio+'">'+dpt.municipio+'</option>';
            });
            $('#ciudad_destino').html(html)
        }
    })
}
