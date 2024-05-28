@extends('layouts.app')

@section('content')
<div class="container-fluid row p-0 m-0">
    <div class="col-6 m-0 p-0" style="width: 250px; height: 100vh;">
        @include('partials.navbar')
    </div>
    
    <div class="col ms-5 p-0 align-self-center">
        <div class="d-flex flex-column  space-between">
            <h1 class="mb-3 flex-shrink-1">Create a new User</h1>
            
            <div class="border border-1 rounded-3 p-2 border-secondary h-100">
                    @include('layouts.create_task')    
            </div>
        </div>
        
    </div>
</div>
@endsection