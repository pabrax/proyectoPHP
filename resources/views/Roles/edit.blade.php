@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Rol</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del rol </label>
            <input type="text" class="form-control" name="name" value="{{ $role->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection