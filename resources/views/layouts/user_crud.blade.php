<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('users.update', $employee->id)}}" method="POST" class="d-flex">
        @csrf
        @method('PUT')
        <div class="mb-3 me-5">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
        </div>
        <div class="mb-3 me-5">
            <label for="lastname" class="form-label">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $employee->lastname) }}" required>
        </div>
        <div class="mb-3 me-5">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
        </div>
        <div class="mb-3 me-5">
            <label for="user_type" class="form-label">User Type</label>
            <select class="form-control" id="user_type" name="user_type" required>
                <option value="gerente" {{ $employee->user_type == 'gerente' ? 'selected' : '' }}>Gerente</option>
                <option value="empleado" {{ $employee->user_type == 'empleado' ? 'selected' : '' }}>Empleado</option>
                <option value="RRHH" {{ $employee->user_type == 'RRHH' ? 'selected' : '' }}>RRHH</option>
                <option value="CEO" {{ $employee->user_type == 'CEO' ? 'selected' : '' }}>CEO</option>
                <option value="marketing" {{ $employee->user_type == 'marketing' ? 'selected' : '' }}>Marketing</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary me-3  align-self-center">Update</button>
        <a href="{{route('users')}}" class="btn btn-danger align-self-center">Cancel</a>
    </form>
</div>