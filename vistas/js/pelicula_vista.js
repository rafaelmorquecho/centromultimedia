
$(document).ready(function () {
    
    var titulo;
    var datos=[];
    
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
// ventana de logeo    

$(".sesion").click(function () {
        $("#loginDialog").dialog('open');
        $('#usuarios').remove();
        $('#usuario').show();
        
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

                console.log(datos);
                
                $('#peliculas-info').append("<tbody id='cuerpo'>");
                $('#tabla').css('visibility', 'visible');
                $('#cuerpo').append("<img style='float:right' src= '" + datos.cartel + "'" + " alt='Caratula' ><h3>Sinopsis</h3><br><p>" + datos.sinopsis + "</p>")
                $("#peliculaDialog").dialog("option", "title", datos.titulo);
                $('#cuerpo').append("<h3>Actores</h3><p>");
                $.each(datos['actores'], function (i, item) {
                    $('#cuerpo').append( item + ", ");
                    $("#peliculaDialog").dialog("option", "title", datos.titulo);
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
                
                    $('#gestion').append("<table id='usuarios' class='table table-condensed'><thead><tr><th>Nombre</th><th>logins</th><th>Email</th><th></th></tr></thead>\
                <tbody id='cuerpo_usuarios'><tbody></table>");
                    //$('#usuarios').css('visibility', 'visible');
                    $('#usuario').hide();
                
    
                    $.each(usuario, function(i,item) {
                        
                    $('#cuerpo_usuarios').append("<tr><td>" + item.nombre + "</td><td>" +
                    item.login + "</td><td>" + item.email +
                        "</td><td>" + item.tipo  +
                        "</td><td><input type='button' class='borrar' data-id='" + item.id + "'  value='Borrar'></td><"+
                        "</td><td><input type='button' class='editar' data-id='" + item.id + "'  value='Editar'></td></tr>");
                    
                });

                $('#cuerpo_usuarios').append("<tr><td><input type='button' class='añadir' data-id=''  value='Añadir'></td></tr>");
                $('.borrar').on('click', usuariosBorrar);
                $('.editar').on('click', usuariosEditar);
                $('.añadir').on('click', usuariosAñadir);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                abError(errorThrown);
                return false;
            }
        });

        function usuariosBorrar(){
            var id_usuario = $(this).attr('data-id');
            
            var dataSent = {
                id:id_usuario
            
            };
    
        
            $.ajax({
                url: "ajax/usuario_borrar.php",
                type: "POST",
                data: dataSent,
                success: function (data, textStatus, jqXHR) {
                    $('#usuarios').remove();
                    var usuario_borrado = data;
                    alert(data);
                    if(usuario_borrado > 0){
                    alert("El Usuario con id " + id_usuario + "ha sido borrado" );
                    console.log(usuario_borrado);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    abError(errorThrown);
                    return false;
                }
            });



        }
        function usuariosEditar(){

        }
        function usuariosAñadir(){
            $('#usuarios').remove();
            $('#gestion').append("<div><form id='usuarios'>\
            <label for='nombre'>Nombre: </label><input type='text' name='nombre' id='nombre'>\
            <br>\
            <label for='email'>Email: </label><input type='text' name='email' id='email'>\
            <br>\
            <label for='login'>login: </label><input type='text' name='login' id='login'>\
            <br>\
            <label for='password'>Paswword: </label><input type='password' name='password' id='password'>\
            <br>\
            <input type='button' value='Enviar'><input type='reset'>\
            <form></div>");

        }
    });




});//fin




