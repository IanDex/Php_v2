(function() {
    'use strict';
    window.addEventListener('load', function() {
        jQuery(function() {
            jQuery( "#formulario" ).validate({
                rules: {
                    descripcion: {
                        required: true,

                        maxlength: 200
                    },
                    presupuesto: {
                        required: false,
                        number: true
                    }


                },
                messages: {
                    descripcion: {
                        required: "Campo obligatorio",
                        maxlength:"Maximo 200 caracteres"
                    },
                    presupuesto: {
                        number: "Solo numeros"
                    }
                }
            });

        });
    }, false);
})();

$(document).ready(function(){


    $("#btnEnviar").click(function() {

        if ($("#formulario").valid()) {
            //$("#formulario").submit();
            var num_proceso = ($("#num_proceso").val());
            var descripcion = ($("#descripcion").val());
            var sede = ($("#sede").val());
            var presupuesto = ($("#presupuesto").val());
            // Guardamos los datos
            var formulario = $("#formulario").serializeArray();
            $.ajax({
                type : "POST",
                url : "../Controller/FormularioController.php",
                data: {
                    action : "crear",
                    num_proceso : num_proceso,
                    descripcion : descripcion,
                    sede : sede,
                    presupuesto : presupuesto
                },
                success : function(data)
                {
                    limpiar(data)
                        console.log(data);

                }
            });
        }
    });

    $("#btnUpdate").click(function() {

        if ($("#formularioupdt").valid()) {
            //$("#formulario").submit();
            var fecha = ($("#fecha").val());   var id = ($("#id").val());
            var descripcion = ($("#descripcion").val());
            var sede = ($("#sede").val());
            var presupuesto = ($("#presupuesto").val());
            // Guardamos los datos
            var formulario = $("#formularioupdt").serializeArray();
            $.ajax({
                type : "POST",
                url : "../Controller/FormularioController.php",
                data: {
                    action : "update",
                    descripcion : descripcion,
                    sede : sede,
                    presupuesto : presupuesto,
                    fecha : fecha,
                    id : id,
                },
                success : function(data)
                {

                    if (data=="True"){
                        swal(
                            'Actualiazado',
                            'Tu formulario se ha actualizado con éxito!',
                            'success'
                        );
                        backhome();
                    }else {
                        not("Houston, tenemos un problema","Upsssss");
                    }
                }
            });
        }
    });

    function backhome() {
        window.location.href = "ver-todo.php";
    }
    function limpiar(data) {
        if(data=="True"){
            swal(
                'Guardado',
                'Tu formulario se ha guardado con éxito!',
                'success'
            );
            $("#divid").load(" #divid");
            $("#divid2").load(" #divid2");
            document.location.href = "#home";
            document.getElementById('btnNew').disabled = false;
            $("#_disabled").addClass('_disabled');
            document.getElementById("formulario").reset();
        }else{
            swal(
                'Upssss',
                'Tenemos problemas intentalo nuevamnete!',
                'error'
            )
        }
    }

    $("#btnNew").click(function(){
        $("#_disabled").removeClass('_disabled');
        document.getElementById('btnNew').disabled = true;
        document.location.href = "#_disabled";
        not($con,"Creando Nuevo Proceso ");
    });

});

