<!-- creado por felipe leon osorio -->

@extends('layouts.app')


@section('content')
<div class="container-fluid row p-0 m-0 spa">
    <div class="col-6 m-0 p-0" style="width: 250px; height: 100vh;">
        @include('partials.navbar')
    </div>
    
    <div class="col ms-5 p-0 align-self-center me-5">
        <div class="d-flex flex-column  space-between">
            <h1 class="mb-3 flex-shrink-1">Menu principal de gestion ProyectoPHP</h1>
            
            <div class="p-2 h-100">
                    @include('layouts.home')    
            </div>
        </div>
        
    </div>
</div>
@endsection

