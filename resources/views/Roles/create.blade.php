@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear rol</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre de rol</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear rol</button>
    </form>
</div>
@endsection