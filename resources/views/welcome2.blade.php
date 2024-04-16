<div id="welcome-message">
    <!-- Bienvenid@ nuevamente   -->
</div>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <header>
            <h1>Bienvenido(a) a la Plataforma de Gestión</h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="tasks.php">Gestión de Tareas</a></li>
                    <li><a href="users.php">Gestión de Usuarios</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section id="welcome-message">
                <!-- El mensaje de bienvenida se insertará aquí -->
            </section>
        </main>

        <footer>
            <p>© 2024 Universidad XYZ. Todos los derechos reservados.</p>
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