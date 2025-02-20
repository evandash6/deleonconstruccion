<script>
$(document).ready(function() {

    //Iniciamos ocultando la tabla que muestra la consulta de los oficios.
    $("#div_oficios").hide();

    
    function table(){
        $('#dt-oficios').DataTable({
        responsive: true,
        ordering: false,
        //scrollY: "200px",  // Altura del scroll vertical
        scrollX: true,
        //searching: false,
        lengthChange: false,
        //Colocamos la tabla en español
        language: {
            url: `<?=base_url()?>/frontend/js/es_es.json`,
        }
    });
    }

        //Iniciamos el directorio
        iniciaDirectorio();

    

    //Evento de envio del formulario de correo de contactos
    $('#enviar').on('click', function(e){

        e.preventDefault();


        let forms = $('#formcontacto');

        if(forms[0].reportValidity() === false){

            forms[0].classList.add('was-validated');

        } else{

            var formData = new FormData(document.getElementById("formcontacto"));
            let url = "<?=base_url()?>email/contacto";

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

                                if(res.estatus == 200){

                                    //Notificamos al usuario que sus datos fueron guardados correctamente 
                                    //Swal.fire("Contacto guardado correctamente, se pondran en contacto al correo o teléfono guardado.");
                                    Swal.fire(
                                    {
                                        //type: "",
                                        title: "DE LEÓN-CONSTRUCCIÓN agradece su preferencia",
                                        text: "Contacto guardado correctamente, se pondrán en contacto al correo o teléfono guardado."
                                        //footer: "<a href>Why do I have this issue?</a>"
                                    });
                                    //Limpiamos el formulario de contacto.
                                    $("#formcontacto")[0].reset();

                                }else{

                                    Swal.fire("Error al guardar la información, intente más tarde.");
                                    $("#formcontacto")[0].reset();
                                    //Notificamos al correo el error de guardado de información al Administrador.

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
    $('#btn-llamada').on('click',function(e){

        e.preventDefault();

        let forms = $('#form-llamada');

        if(forms[0].reportValidity() === false){

            forms[0].classList.add('was-validated');

        } else{

            //Enviamos los datos a la funsión que ayudara ha guardar.
                var formData = new FormData(document.getElementById("form-llamada"));

                SolicitarLlamada(formData);
        }

    });

    //Reparación de viviendas
    $('#btn-llamada2').on('click',function(e){

        e.preventDefault();

        let forms = $('#form-llamada2');

        if(forms[0].reportValidity() === false){

            forms[0].classList.add('was-validated');

        } else{

            //Enviamos los datos a la funsión que ayudara ha guardar.
                var formData = new FormData(document.getElementById("form-llamada2"));

                SolicitarLlamada(formData);
        }

        });

    //Diseños y remodelaciones
    $('#btn-llamada3').on('click',function(e){

        e.preventDefault();

        let forms = $('#form-llamada3');

        if(forms[0].reportValidity() === false){

            forms[0].classList.add('was-validated');

        } else{

            //Enviamos los datos a la funsión que ayudara ha guardar.
                var formData = new FormData(document.getElementById("form-llamada3"));

                SolicitarLlamada(formData);
        }

        });

        ///Cargas municipios dependiendo la selección del estado
        $('#id_estado').on('change',function(){

            let cve_ent = $(this).val();

            //console.log(cve_ent);

             // Si se selecciona una categoría válida
            if (cve_ent) {
                $.ajax({
                    url: '<?=base_url()?>home/municipios/'+cve_ent, // Cambia esto por la URL de tu servidor
                    //method: 'GET',
                    data: { cve_ent: cve_ent }, // Pasa el ID de la categoría
                    success: function(data) {

                        let res = JSON.parse(data);

                        //console.log(res)
                        let municipio = res.municipio

                       // Suponiendo que la respuesta es una lista de opciones
                        //var items = response.items; // Ajusta según el formato de la respuesta

                        // Limpiar el segundo select antes de llenarlo
                        $('#c_municipio').empty();
                        $('#c_municipio').append('<option value="">Selecciona un municipio</option>');

                        // Rellenar el segundo select con los datos recibidos
                        municipio.forEach(function(municipio) {
                            $('#c_municipio').append('<option value="' + municipio.id + '">' + municipio.nom_mun + '</option>');
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
        $('#b_id_estado').on('change',function(){

            let cve_ent = $(this).val();

            //console.log(cve_ent);

            // Si se selecciona una categoría válida
            if (cve_ent) {
                $.ajax({
                    url: '<?=base_url()?>home/municipios/'+cve_ent, // Cambia esto por la URL de tu servidor
                    //method: 'GET',
                    data: { cve_ent: cve_ent }, // Pasa el ID de la categoría
                    success: function(data) {

                        let res = JSON.parse(data);

                        //console.log(res)
                        let municipio = res.municipio

                    // Suponiendo que la respuesta es una lista de opciones
                        //var items = response.items; // Ajusta según el formato de la respuesta

                        // Limpiar el segundo select antes de llenarlo
                        $('#b_c_municipio').empty();
                        $('#b_c_municipio').append('<option value="">Selecciona un municipio</option>');

                        // Rellenar el segundo select con los datos recibidos
                        municipio.forEach(function(municipio) {
                            $('#b_c_municipio').append('<option value="' + municipio.id + '">' + municipio.nom_mun + '</option>');
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
        $('#btn-directorio').on('click',function(e){

            e.preventDefault();

            //console.log('Directorio');
            let forms = $('#form-directorio');

            if(forms[0].reportValidity() === false){

                forms[0].classList.add('was-validated');

            } else{

                //Enviamos los datos a la funsión que ayudara ha guardar.
                    var formData = new FormData(document.getElementById("form-directorio"));

                    
                    //console.log(formData)
                    $.ajax({
                    url: '<?=base_url()?>home/guardaDirectorio', // Cambia esto por la URL de tu servidor
                    method: 'POST',
                    data: formData, 
                    contentType: false, //importante enviar este parametro en false
                    processData: false, //importante enviar este parametro en false
                    success: function(data) {

                        let res = JSON.parse(data);

                        //console.log(res);
                        if(res.estatus==200){

                            Swal.fire(
                                    {
                                        //type: "",
                                        title: "DE LEÓN-CONSTRUCCIÓN agradece su preferencia",
                                        text: res.respuesta
                                        //footer: "<a href>Why do I have this issue?</a>"
                                    });
                                    //Limpiamos el formulario de contacto.
                                    $("#form-directorio")[0].reset();
                        }else{

                            Swal.fire(
                                    {
                                        //type: "",
                                        title: "Error",
                                        text: res.error
                                        //footer: "<a href>Why do I have this issue?</a>"
                                    });
                                    //Limpiamos el formulario de contacto.
                                    $("#form-directorio")[0].reset();

                        }

                    },
                    error: function() {
                        alert('Error al guardar el directorio, Intente mas tarde.');
                        $("#form-directorio")[0].reset();
                    }
                });
            }

        });


    //**Boton para realizar las busquedas y mostrar la tabla que contendar el concentrado */
    //Guardar directorio de las personas que se registren.
    $('#buscar_directorio').on('click',function(e){

        e.preventDefault();

        //console.log('Directorio');
        let forms = $('#formbuscar');

        if(forms[0].reportValidity() === false){

            forms[0].classList.add('was-validated');

        }else{

                //Realizamos la busqueda mediante ajax
                //Enviamos los datos a la funsión que ayudara ha guardar.
                var formData = new FormData(document.getElementById("formbuscar"));

                    
                //console.log(formData)
                $.ajax({
                url: '<?=base_url()?>home/buscarDirectorio', // Cambia esto por la URL de tu servidor
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
function iniciaDirectorio(){

//Realizamos la busqueda mediante ajax
            //Enviamos los datos a la funsión que ayudara ha guardar.
            var formData = new FormData(document.getElementById("formbuscar"));

                
            //console.log(formData)
            $.ajax({
            url: '<?=base_url()?>home/buscarDirectorio', // Cambia esto por la URL de tu servidor
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
function detalle(val){

//alert(val)
    let url = "<?=base_url()?>home/detalleServicio/"+val;

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
                    if(res.estatus==200){

                       //Si existe información abrimos el modal y pasamos los datos de la ficha tecnica del detalle de cada oficio:
                            
                        if ($('#exampleModal').length) {

                            //Abrimos el modal
                            $('#exampleModal').modal('show');
                            //Pasamos los datos para mostrar la información dentro del modal
                            $('#estado').html(res.respuesta[0].nom_ent);
                            $('#municipio').html(res.respuesta[0].nom_mun)


                            }else{

                                alert('Error!! No se puede abrir el Modal o no se encuentra, intente más tarde');
                            }

                        //console.log(res.respuesta[0].nombre_empresa)

                        /*Swal.fire({
                            title: 'Directorio - Detalle',
                            html: '<center><table border="0">'+
                                    '<tr>'+
                                        '<td colspan="2"><img src="<?=base_url()?>frontend/images/deleon-construccion.png" width="200" height="50" alt="Construction"></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><b>Estado:</b> </td>'+
                                        '<td>'+res.respuesta[0].nom_ent+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><b>Municipio:</b> </td>'+
                                        '<td>'+res.respuesta[0].nom_mun+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><b>Oficio: </b></td>'+
                                        '<td>'+res.respuesta[0].oficio+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><b>Empresa:</b> </td>'+
                                        '<td>'+res.respuesta[0].nombre_empresa+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><b>Responsable: </b></td>'+
                                        '<td>'+res.respuesta[0].nombre+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><b>Teléfono: </b></td>'+
                                        '<td>'+res.respuesta[0].telefono+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><b>Correo: </b></td>'+
                                        '<td>'+res.respuesta[0].correo+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td colspan="2"><b>Dirección:</b></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td colspan="2">'+res.respuesta[0].direccion+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td colspan="2"><b>Descripción de la empresa:</b></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td colspan="2">'+res.respuesta[0].descripcion_empresa+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td colspan="2"><b><i class="fa fa-camera"></i> Galería fotográfica:</b></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td colspan="2"><center><p>Fotografía 1:</p><img src="<?=base_url()?>uploads/imgs/'+res.respuesta[0].foto1+'" width="450" height="400" alt="Construction"></center></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td colspan="2"><center><p>Fotografía 2:</p><img src="<?=base_url()?>uploads/imgs/'+res.respuesta[0].foto2+'" width="450" height="400" alt="Construction"></center></td>'+
                                    '</tr>'+
                                  '</table></center>',
                                  width: '50%',
                            type: 'success',
                            //timer: 3000,
                        });*/

                    }else{


                    }

                },

                //Errores
                 error: function(r) {        
                    console.log("<b>Error Interno! </b><b>Favor de verificar con el adminiatrdor</b>");
                }

            }); //Fin del ajax

}

//Funsión para las guardas las solicitudes de llamadas
function SolicitarLlamada(formData){


    console.log(formData)

    let url = "<?=base_url()?>email/servicios";

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

                               
                    console.log("<b>Error Interno! </b><b>Favor de verificar con el adminiatrdor</b>");

                }

            }); //Fin del ajax


            


}

</script>