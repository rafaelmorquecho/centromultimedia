
$(document).ready(function () {
    
    var titulo;
    var datos=[];
    

    $(".sesion").click(function () {
        $("#loginDialog").dialog('open');
        
    });

    $('#loginDialog').dialog({
        title: "LOGIN",
        autoOpen: false,
        height: 'auto',
        width: 800,
        modal: true,
        buttons: [{
                text: "ver",
                click: function () {


                }

            }, {
                text: "Añadir a favoritos"

            },
            {

                text: "Cancelar",
                click: function () {
                    $(this).dialog("close");
                }


            }
        ]
    });

    

    
    
   
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






});//fin




