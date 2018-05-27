

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>LOGIN</title>
<link rel="stylesheet" media="screen" href="vistas/css/login.css" >
</head>
    <body>
        <div class="container ">
            <form class="formulario" name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <ul>
                    <li>
                        <h2>LOGIN</h2>
                    </li>
                    <li>
                        <label for="usuario">Nombre de usuario:</label>
                        <input id="usuario" name="login" type="text"  placeholder="Introduzca su nombre de usuario" maxlength="32" required >
                    </li>
                    <li>
                        <label for="contraseña">Introduzca su contraseña</label>
                        <input id="contraseña" name="password" type="password"  placeholder="Introduzca su contraseña" maxlength="8" required >
                
                    <li>
                    <button class="enviar" type="submit">lOGIN</button>
                    <button class="enviar" type="reset">Borrar</button>
                    </li>
                </ul>
                
            </form>
        </div>
        
    </body>
</html>