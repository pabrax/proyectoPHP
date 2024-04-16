<form action="login.php" method="post">
    <div class="form-group">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Iniciar sesión</button>
</form>

<style>
    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    button {
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        border: none;
        cursor: pointer;
    }
</style>