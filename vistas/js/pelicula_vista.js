
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
        //console.log("Handler for .click() called." + id);

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

    $('#gestionUsuarios').click(function mostrarUsuarios () {
        
        var dataSent = {
            
        };

    
        $.ajax({
            url: "ajax/usuarios.php",
            type: "POST",
            data: dataSent,
            success: function (data, textStatus, jqXHR) {
                $('#usuarios').remove();
                var usuario = $.parseJSON(data);
                //console.log(usuario);
                
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
                alert(errorThrown);
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
                    var usuario_borrado = $.parseJSON(data);
                    alert(data)
                    if(usuario_borrado > 0){
                    alert("El Usuario con id " + id_usuario + "ha sido borrado" );
                    //console.log(usuario_borrado);
                    

                    }
                    mostrarUsuarios ();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    return false;
                }
            });

        }
        function usuariosEditar(){
            var checkedUser;
            var checkedAdmin;
            var admin;
            var usuario;
            var id_usuario = $(this).attr('data-id');
            var dataSent = {
                id:id_usuario
            };
    
            $.ajax({
                url: "ajax/usuarios_editar.php",
                type: "POST",
                data: dataSent,
                success: function (data, textStatus, jqXHR) {
                   
                    $('#usuarios').remove();
                    var usuario = $.parseJSON(data);
                    //console.log(usuario);
                    $.each(usuario, function(i,item) {
                        $.each(item.tipo, function(j,item2) {
                            if(item2 === 'admin' ){
                                checkedAdmin = 'checked';
                            }
                             
                            if(item2 == 'usuario' ){
                                checkedUser = 'checked'
                             }          
                 
                         });  
            
            $('#gestion').append("<div><form id='usuarios'>\
            <label for='id'>ID </label><input type='text' name='id' disabled value=" +"'"+ id_usuario +"'"+ "id='id_usuario' required >\
            <br>\
            <label for='nombre'>Nombre: </label><input type='text' name='nombre' value=" +"'"+ item.nombre +"'"+ "id='nombre' required >\
            <br>\
            <label for='email'>Email: </label><input type='text' name='email' value=" +"'"+ item.email +"'"+ " id='email' required >\
            <br>\
            <label for='login'>login: </label><input type='text' name='login'value=" +"'"+ item.login +"'"+ " id='login' required >\
            <br>\
            <label for='password'>Paswword: </label><input type='password' value=" +"'"+ item.password +"'"+ " name='password' id='password' required >\
            <br>");
            $('#usuarios').append("<input type='checkbox' "+ checkedAdmin + "  value ='si' name='admin' id='admin' data-id='1'>admin\
            <br>");
            $('#usuarios').append("<input type='checkbox'   "+ checkedUser + "  value ='si' name='usuario' id='usuario' data-id='2'>usuario\
            <br>");
            }); 
            $('#usuarios').append("<input type='button' value='Enviar' id='btn-enviar'><input type='reset'>\
            <form></div>");
        },

        error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    return false;
                }
            });
        }

        $(document).on("click ", "#btn-enviar", function() {
        
            mostrarUsuarios ();
            

            var dataSent = {
                
                id:$('#id_usuario').val(),
                nombre:$('#nombre').val(),
                email: $('#email').val(),
                login: $('#login').val(),
                password:$('#password').val(),
                admin:$('input:checkbox[name=admin]:checked').val(),
                usuario:$('input:checkbox[name=usuario]:checked').val(),
            
            };
    
        
            $.ajax({
                url: "ajax/update_usuario.php",
                type: "POST",
                data: dataSent,
                success: function (data, textStatus, jqXHR) {
                    
                    /*var usuario_modificado = $.parseJSON(data);
                    alert(usuario_modificado)
                    if(usuario_modificado > 0){
                    alert("El Usuario con id " + id_usuario + "ha sidomodificado" );
                    console.log(usuario_modificado);

                    }*/
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    return false;
                }
            });
            

        });


        function usuariosAñadir(){
            $('#usuarios').remove();
            $('#gestion').append("<div><form id='usuarios'>\
            <label for='nombre'>Nombre: </label><input type='text' name='nombre' id='nombre' required>\
            <br>\
            <label for='email'>Email: </label><input type='text' name='email' id='email' required>\
            <br>\
            <label for='login'>login: </label><input type='text' name='login' id='login' required>\
            <br>\
            <label for='password'>Paswword: </label><input type='password' name='password' id='password' required>\
            <br>");
            
            $('#usuarios').append("<input type='checkbox'  value ='si' name='admin' id='admin' data-id='1'>admin\
            <br>");
            $('#usuarios').append("<input type='checkbox' value ='si' name='usuario' id='usuario' data-id='2'>usuario\
            <br>");

            $('#usuarios').append("<input type='button' id='btn-añadir' value='Enviar'><input type='reset'>\
            <form></div>");

        }
    });


    $(document).on("click ", "#btn-añadir", function() {
        
        var dataSent = {
            
            id:$('#id_usuario').val(),
            nombre:$('#nombre').val(),
            email: $('#email').val(),
            login: $('#login').val(),
            password:$('#password').val(),
            admin:$('input:checkbox[name=admin]:checked').val(),
            usuario:$('input:checkbox[name=usuario]:checked').val(),
        
        };

        $.ajax({
            url: "ajax/insert_usuario.php",
            type: "POST",
            data: dataSent,
            success: function (data, textStatus, jqXHR) {

                /*var usuario_modificado = $.parseJSON(data);
                alert(usuario_modificado)
                if(usuario_modificado > 0){
                alert("El Usuario con id " + id_usuario + "ha sidomodificado" );
                console.log(usuario_modificado);

                }*/
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
                return false;
            }
        });
    });
});//fin




