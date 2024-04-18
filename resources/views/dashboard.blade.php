<!-- creado por felipe leon osorio -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <header>
            <h1>Menu principal de gestion ProyectoPHP</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('users') }}">Usuarios</a></li>
                    <li><a href="{{ route('tasks') }}">Tareas</a></li>
                    <li><a href="{{ route('assists') }}">asistencia</a></li>
                    <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section id="welcome-message">
                <!-- El mensaje de bienvenida se insertará aquí -->
                <h2>proyecto creado por:</h2>
                <h3>pablo espinosa Giraldo</h3>
                <h3>Santiago bedoya santa</h3>
                <h3>Daniel cardona arroyave</h3>
                <h3></h3>
            </section>
        </main>

        <footer>
            <p>© 2024 Instituto Tecnologico Metropolitano.</p>
        </footer>
    </div>

</body>

</html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
    }

    nav ul li {
        display: inline-block;
        margin-right: 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: #333;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    nav ul li a:hover {
        background-color: #007BFF;
        color: white;
    }

    #welcome-message {
        font-size: 1.2em;
        margin-top: 20px;
    }
</style>