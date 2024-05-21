<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="user_type">User Type:</label>
        <select name="user_type" id="user_type" class="form-control" required>
            <option value="gerente">Gerente</option>
            <option value="empleado">Empleado</option>
            <option value="RRHH">RRHH</option>
            <option value="CEO">CEO</option>
            <option value="marketing">Marketing</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Create</button>
</form>