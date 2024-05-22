<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMAZON-INICIO DE SESION</title>

    <link href="{{ asset('css/style2.css') }}"  rel="stylesheet">

</head>


<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <h2 class="inactive underlineHover"><a href="/login">Iniciar sesion</a></h2>
        <h2 class="active ">Crear cuenta</a></h2>

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="https://cdn-icons-png.flaticon.com/128/3237/3237472.png" alt="Icono de usuario" />
        </div>

        <!-- Login Form -->
        <form action="{{ route('register') }}" method="post">
            @csrf <!-- Agrega el token CSRF para protección contra CSRF -->
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido_paterno" placeholder="Apellido Paterno" required>
            <input type="text" name="apellido_materno" placeholder="Apellido Materno" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña minimimo 8 caracteres" required>
            <select name="genero" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
            <!-- Por defecto, asigna el rol de cliente -->
            
        
            <input type="submit" value="Registrarse">
        </form>
        
        
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Olvidaste tu contraseña?</a>
        </div>

    </div>
</div>
</div>
</html>