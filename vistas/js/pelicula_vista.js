
$(document).ready(function () {
    
    var titulo;
    var datos=[];
    
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
// ventana de logeo    

$(".sesion").click(function () {
        $("#loginDialog").dialog('open');
        
    });

    $('#loginDialog').dialog({
        title: "LOGIN",
        autoOpen: false,
        height: 'auto',
        width: 800,
        modal: true,
        buttons: [
            {

                text: "Cerrar",
                click: function () {
                    $(this).dialog("close");
                }


            }
        ]
    });

    

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////  

// mostar titulo
   
    $(".cartel").mouseover(function () {

        titulo = $(this).attr("titulo");
        //console.log("Handler for .mouseover() called." + titulo);
        $('#titulo').text(titulo);
    });

    $('.cartel').click(function () {
        $("#peliculaDialog").dialog('open');
        var id = $(this).attr("id");
        console.log("Handler for .click() called." + id);

        var dataSent = {
            id: id
        };

        $.ajax({
            url: "ajax/cartel.php",
            type: "POST",
            data: dataSent,
            success: function (data, textStatus, jqXHR) {
                $('#cuerpo').remove();
                datos = $.parseJSON(data);

                //console.log(datos);
                
                $('#peliculas-info').append("<tbody id='cuerpo'>");
                $('#tabla').css('visibility', 'visible');
                $('#cuerpo').append("<img style='float:right' src= '" + datos['titulo'].cartel + "'" + " alt='Caratula' ><h3>Sinopsis</h3><br><p>" + datos['titulo'].sinopsis + "</p>")
                $("#peliculaDialog").dialog("option", "title", datos['titulo'].titulo);
                $('#cuerpo').append("<h3>Actores</h3><p>");
                $.each(datos['actores'], function (i, item) {
                    $('#cuerpo').append( item.nombre + ", ");
                    $("#peliculaDialog").dialog("option", "title", datos['titulo'].titulo);
                });
                $('#cuerpo').append("</p>");

            },
            error: function (jqXHR, textStatus, errorThrown) {
                abError(errorThrown);
                return false;
            }
        });
        

    });
    
////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
// añadir a favoritos
    dialog = $('#peliculaDialog').dialog({
        title: "titulo",
        autoOpen: false,
        height: 'auto',
        width: 800,
        modal: true,
        buttons: [{
                text: "ver",
                click: function () {


                }

            }, {
                text: "Añadir a favoritos",
                click: function () {
                $('#favoritas').append("<img class='cartel' id=" + datos['titulo'].id_pelicula + " titulo = " + datos['titulo'].titulo + " src= " + datos['titulo'].cartel + " alt='Caratula' > ");
                }

            },
            {

                text: "Cancelar",
                click: function () {
                    $(this).dialog("close");
                }


            }
        ]
    });

    $('#gestionUsuarios').click(function () {
        
        var dataSent = {
            
        };

    
        $.ajax({
            url: "ajax/usuarios.php",
            type: "POST",
            data: dataSent,
            success: function (data, textStatus, jqXHR) {
                $('#usuarios').remove();
                var usuario = $.parseJSON(data);
                console.log(usuario);
                if (usuario.length > 0) {
                    $('#gestion').append("<table id='usuarios' class='table table-condensed'><thead><tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Privilegios</th></tr></thead>\
                <tbody id='cuerpo_usuarios'><tbody></table>");
                    $('#usuarios').css('visibility', 'visible');
                } else {
                    $('#usuarios').css('visibility', 'hidden');
                    $('#gestion').append("<p id='usuarios' style='color:red' ><?php echo _('No se han encontrado resultados con los datos introducidos. Inténtalo de nuevo.') ?></p>");
                    //abAlert("<?php echo _('No se han encontrado resultados con los datos introducidos. Inténtalo de nuevo.') ?>")
                }
    
                $.each(usuario, function (i, item) {
                    $('#cuerpo_usuarios').append("<tr><td>" + item.nombre+ "</td><td>" +
                        item.login + "</td><td>" + item.email +
                        "</td><td>" + item.tipo +
                        "</td><td><input type='button' class='btn btn-primary btn-sm anadir' data-id='" + item.id + "'  value='añadir'></td></tr>");
                });
                $('.anadir').on('click', usuarios);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                abError(errorThrown);
                return false;
            }
        });

        function usuarios(){

        }
    
        
    });




});//fin




