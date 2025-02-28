<script>
$(document).ready(function() {

    //Iniciamos ocultando la tabla que muestra la consulta de los oficios.
    $("#div_oficios").hide();

    function table() {
        $('#dt-oficios').DataTable({
            responsive: true,
            ordering: false,
            //scrollY: "200px", // Altura del scroll vertical
            //scrollX: true,
            //searching: false,
            lengthChange: false,
            //Colocamos la tabla en español
            language: {
                url: `<?= base_url() ?>/frontend/js/es_es.json`,
            }
        });
    }

    //Iniciamos el directorio
    iniciaDirectorio();

    //Evento de envio del formulario de correo de contactos
    $('#enviar').on('click', function(e) {

        e.preventDefault();

        //Desactivamos el boton de enviar
        $('#enviar').prop("disabled", true);


        let forms = $('#formcontacto');

        if (forms[0].reportValidity() === false) {

            forms[0].classList.add('was-validated');

        } else {

            var formData = new FormData(document.getElementById("formcontacto"));
            let url = "<?= base_url() ?>email/contacto";

            $.ajax({
                type: "POST",
                dataType: "html",
                cache: false,
                url: url,
                data: formData,
                contentType: false, //importante enviar este parametro en false
                processData: false, //importante enviar este parametro en false
                success: function(data) {

                    let res = JSON.parse(data);

                    //console.log(res.estatus)

                    if (res.estatus == 200) {
                        
                        //Notificamos al usuario que sus datos fueron guardados correctamente 
                        //Swal.fire("Contacto guardado correctamente, se pondran en contacto al correo o teléfono guardado.");
                        Swal.fire({
                            //type: "",
                            title: "DE LEÓN-CONSTRUCCIÓN agradece su preferencia",
                            text: "Contacto guardado correctamente, se pondrán en contacto al correo o teléfono registrados."
                            //footer: "<a href>Why do I have this issue?</a>"
                        });
                        //Limpiamos el formulario de contacto.
                        $("#formcontacto")[0].reset();

                        //Activamos el boton
                        $('#enviar').prop("disabled", false);
                        

                    } else {

                        Swal.fire("Error al guardar la información, intente más tarde.");
                        $("#formcontacto")[0].reset();
                        //Notificamos al correo el error de guardado de información al Administrador.

                        //Activamos el boton
                        $('#enviar').prop("disabled", false);

                    }

                },

                //Errores
                error: function(r) {


                    Swal.fire("Error!!, intente más tarde.");
                    $("#formcontacto")[0].reset();

                }

            }); //Fin del ajax
        }


    });

    //Evento de envio de llamados

    //Construcción de casas
    $('#btn-llamada').on('click', function(e) {

        e.preventDefault();

        let forms = $('#form-llamada');

        if (forms[0].reportValidity() === false) {

            forms[0].classList.add('was-validated');

        } else {

            //Enviamos los datos a la funsión que ayudara ha guardar.
            var formData = new FormData(document.getElementById("form-llamada"));

            SolicitarLlamada(formData);
        }

    });

    //Reparación de viviendas
    $('#btn-llamada2').on('click', function(e) {

        e.preventDefault();

        let forms = $('#form-llamada2');

        if (forms[0].reportValidity() === false) {

            forms[0].classList.add('was-validated');

        } else {

            //Enviamos los datos a la funsión que ayudara ha guardar.
            var formData = new FormData(document.getElementById("form-llamada2"));

            SolicitarLlamada(formData);
        }

    });

    //Diseños y remodelaciones
    $('#btn-llamada3').on('click', function(e) {

        e.preventDefault();

        let forms = $('#form-llamada3');

        if (forms[0].reportValidity() === false) {

            forms[0].classList.add('was-validated');

        } else {

            //Enviamos los datos a la funsión que ayudara ha guardar.
            var formData = new FormData(document.getElementById("form-llamada3"));

            SolicitarLlamada(formData);
        }

    });

    ///Cargas municipios dependiendo la selección del estado
    $('#id_estado').on('change', function() {

        let cve_ent = $(this).val();

        //console.log(cve_ent);

        // Si se selecciona una categoría válida
        if (cve_ent) {
            $.ajax({
                url: '<?= base_url() ?>home/municipios/' +
                    cve_ent, // Cambia esto por la URL de tu servidor
                //method: 'GET',
                data: {
                    cve_ent: cve_ent
                }, // Pasa el ID de la categoría
                success: function(data) {

                    let res = JSON.parse(data);

                    //console.log(res)
                    let municipio = res.municipio

                    // Suponiendo que la respuesta es una lista de opciones
                    //var items = response.items; // Ajusta según el formato de la respuesta

                    // Limpiar el segundo select antes de llenarlo
                    $('#c_municipio').empty();
                    $('#c_municipio').append(
                        '<option value="">Selecciona un municipio</option>');

                    // Rellenar el segundo select con los datos recibidos
                    municipio.forEach(function(municipio) {
                        $('#c_municipio').append('<option value="' + municipio.id +
                            '">' + municipio.nom_mun + '</option>');
                    });

                },
                error: function() {
                    alert('Error al cargar los municipios.');
                }
            });
        } else {
            // Si no se selecciona una categoría, vaciar el segundo select
            $('#c_municipio').empty();
            $('#c_municipio').append('<option value="">Selecciona un municipio</option>');
        }
    });

    //Cargamos el select de Municipio desde la busqueda del directorio
    $('#b_id_estado').on('change', function() {

        let cve_ent = $(this).val();

        //console.log(cve_ent);

        // Si se selecciona una categoría válida
        if (cve_ent) {
            $.ajax({
                url: '<?= base_url() ?>home/municipios/' +
                    cve_ent, // Cambia esto por la URL de tu servidor
                //method: 'GET',
                data: {
                    cve_ent: cve_ent
                }, // Pasa el ID de la categoría
                success: function(data) {

                    let res = JSON.parse(data);

                    //console.log(res)
                    let municipio = res.municipio

                    // Suponiendo que la respuesta es una lista de opciones
                    //var items = response.items; // Ajusta según el formato de la respuesta

                    // Limpiar el segundo select antes de llenarlo
                    $('#b_c_municipio').empty();
                    $('#b_c_municipio').append(
                        '<option value="">Selecciona un municipio</option>');

                    // Rellenar el segundo select con los datos recibidos
                    municipio.forEach(function(municipio) {
                        $('#b_c_municipio').append('<option value="' + municipio
                            .id + '">' + municipio.nom_mun + '</option>');
                    });

                },
                error: function() {
                    alert('Error al cargar los municipios.');
                }
            });
        } else {
            // Si no se selecciona una categoría, vaciar el segundo select
            $('#b_c_municipio').empty();
            $('#b_c_municipio').append('<option value="">Selecciona un municipio</option>');
        }
    });

    //Guardar directorio de las personas que se registren.
    $('#btn-directorio').on('click', function(e) {

        e.preventDefault();

        //iniciamos inactivando el boton de enviar a guardar.
        $('#btn-directorio').prop("disabled", true);

        //console.log('Directorio');
        let forms = $('#form-directorio');

        if (forms[0].reportValidity() === false) {

            forms[0].classList.add('was-validated');

        } else {

            //Enviamos los datos a la funsión que ayudara ha guardar.
            var formData = new FormData(document.getElementById("form-directorio"));


            //console.log(formData)
            $.ajax({
                url: '<?= base_url() ?>home/guardaDirectorio', // Cambia esto por la URL de tu servidor
                method: 'POST',
                data: formData,
                contentType: false, //importante enviar este parametro en false
                processData: false, //importante enviar este parametro en false
                success: function(data) {

                    let res = JSON.parse(data);

                    //console.log(res);
                    if (res.estatus == 200) {

                        Swal.fire({
                            //type: "",
                            title: "DE LEÓN-CONSTRUCCIÓN agradece su preferencia",
                            text: res.respuesta
                            //footer: "<a href>Why do I have this issue?</a>"
                        });
                        //Limpiamos el formulario de contacto.
                        $("#form-directorio")[0].reset();

                        //Activamos el boton
                        $('#btn-directorio').prop("disabled", false);
                    } else {

                        Swal.fire({
                            //type: "",
                            title: "Error",
                            text: res.error
                            //footer: "<a href>Why do I have this issue?</a>"
                        });
                        //Limpiamos el formulario de contacto.
                        $("#form-directorio")[0].reset();

                        //Activamos el boton
                        $('#btn-directorio').prop("disabled", false);

                    }

                },
                error: function() {
                    alert('Error al guardar el directorio, Intente mas tarde.');
                    $("#form-directorio")[0].reset();

                    //Activamos el boton
                    ('#btn-directorio').prop("disabled", false);
                }
            });
        }

    });


    //**Boton para realizar las busquedas y mostrar la tabla que contendar el concentrado */
    //Guardar directorio de las personas que se registren.
    $('#buscar_directorio').on('click', function(e) {

        e.preventDefault();

        //console.log('Directorio');
        let forms = $('#formbuscar');

        if (forms[0].reportValidity() === false) {

            forms[0].classList.add('was-validated');

        } else {

            //Realizamos la busqueda mediante ajax
            //Enviamos los datos a la funsión que ayudara ha guardar.
            var formData = new FormData(document.getElementById("formbuscar"));


            //console.log(formData)
            $.ajax({
                url: '<?= base_url() ?>home/buscarDirectorio', // Cambia esto por la URL de tu servidor
                method: 'POST',
                data: formData,
                contentType: false, //importante enviar este parametro en false
                processData: false, //importante enviar este parametro en false
                success: function(data) {

                    let res = JSON.parse(data);

                    //Habilita la tabla
                    $("#div_oficios").show();

                    //Colocamos la tabla creada en el div
                    //console.log(res.table);
                    $('#div_oficios').html(res.table)
                    table();

                },
                error: function() {
                    alert('Error al buscar');
                }
            });
        }

    });

    //Iniciamos la tabla
    function iniciaDirectorio() {

        //Realizamos la busqueda mediante ajax
        //Enviamos los datos a la funsión que ayudara ha guardar.
        var formData = new FormData(document.getElementById("formbuscar"));


        //console.log(formData)
        $.ajax({
            url: '<?= base_url() ?>home/buscarDirectorio', // Cambia esto por la URL de tu servidor
            method: 'POST',
            data: formData,
            contentType: false, //importante enviar este parametro en false
            processData: false, //importante enviar este parametro en false
            success: function(data) {

                let res = JSON.parse(data);



                //Habilita la tabla
                $("#div_oficios").show();

                //Colocamos la tabla creada en el div
                //console.log(res.table);
                $('#div_oficios').html(res.table)
                table();

            },
            error: function() {
                alert('Error al buscar');
            }
        });
    }
});


/**
 * Detalle con la información de los servicios seleccionados
 */
function showModal(datos) {

    //console.log(datos)
    // almacenamos la ruta de las imagenes
    $ruta = "<?=base_url()?>uploads/imgs/";

    if ($('#exampleModal').length) {

        //Abrimos el modal
        $('#exampleModal').modal('show');
        //Pasamos los datos para mostrar la información dentro del modal
        $('#estado').html($datos.nom_ent);
        $('#municipio').html($datos.nom_mun);
        $('#oficio').html($datos.oficio);
        $('#empresa').html($datos.nombre_empresa);
        $('#responsable').html($datos.nombre);
        $('#telefono').html($datos.telefono);
        $('#correo').html($datos.correo);
        $('#direccion').html($datos.direccion);
        $('#descripcion').html($datos.descripcion_empresa);

        //concatenamos la ruta + la imagen almacenada
        document.getElementById("img1").src = $ruta + $datos.foto1;
        document.getElementById("img2").src = $ruta + $datos.foto2;


    } else {

        alert('Error!! No se puede abrir el Modal o no se encuentra, intente más tarde');
    }
    /*
        document.getElementById("miModal").style.display = "block";

        document.getElementById("btnCerrarModal").addEventListener("click", function() {
            document.getElementById("miModal").style.display = "none";
        });

        $('#estado').html($datos.nom_ent);
        $('#municipio').html($datos.nom_mun);
        $('#oficio').html($datos.oficio);
        $('#empresa').html($datos.nombre_empresa);
        $('#responsable').html($datos.nombre);
        $('#telefono').html($datos.telefono);
        $('#correo').html($datos.correo);
        $('#direccion').html($datos.direccion);
        $('#descripcion').html($datos.descripcion_empresa);*/

}

function detalle(val) {

    //console.log(val)


    let url = "<?= base_url() ?>home/detalleServicio/" + val;

    //Trabajamos mediante ajax para las consultas.
    $.ajax({
        type: "POST",
        dataType: "html",
        cache: false,
        url: url,
        //data: formData,
        contentType: false, //importante enviar este parametro en false
        processData: false, //importante enviar este parametro en false
        success: function(data) {

            let res = JSON.parse(data);

            //Obtenemos la información
            if (res.estatus == 200) {

                $datos = res.respuesta[0];
                //console.log($datos)
                //llamar funcion mostrar y mandar parametros
                showModal($datos);


            } else {

                alert('Error!! No se puede abrir el Modal o no se encuentra, intente más tarde');
            }

        },

        //Errores
        error: function(r) {
            console.log(
                "<b>Error Interno! </b><b>Favor de verificar con el adminiatrdor</b>"
            );
        }

    }); //Fin del ajax



    /*Swal.fire({
        title: 'Título',
        text: 'Mensaje de texto',
        html: '<p>Mensaje de texto con <strong>formato</strong>.</p>',
        type: 'success',
        timer: 3000,
    });

    console.log(val)*/
}

//Funsión para las guardas las solicitudes de llamadas
function SolicitarLlamada(formData) {


    console.log(formData)

    let url = "<?= base_url() ?>email/servicios";

    $.ajax({
        type: "POST",
        dataType: "html",
        cache: false,
        url: url,
        data: formData,
        contentType: false, //importante enviar este parametro en false
        processData: false, //importante enviar este parametro en false
        success: function(data) {

            let res = JSON.parse(data);

            console.log(res.estatus);

        },

        //Errores
        error: function(r) {


            console.log(
                "<b>Error Interno! </b><b>Favor de verificar con el adminiatrdor</b>"
            );

        }

    }); //Fin del ajax





}
</script>