@extends('layouts.app')

@section('content')
<div class="container-fluid row p-0 m-0">
    <div class="col-6 m-0 p-0" style="width: 250px; height: 100vh;">
        @include('partials.navbar')
    </div>
    
    <div class="col ms-5 p-0 align-self-center me-5">
        <div class="d-flex flex-column  space-between">
            <div class="mb-3 d-flex justify-content-between">
                <h1 class="mb-3">User view</h1>
                @if (Auth::user()->user_type == 'gerente' || Auth::user()->user_type == 'CEO')
                    <a href="{{ route('users.create') }}" class="btn btn-primary align-self-center">New User</a>
                @endif
            </div>
            
            <div class="border border-1 rounded-3 p-2 border-secondary h-100">
                    @include('layouts.user_table', ['users' => $employee])    
            </div>
        </div>
        
    </div>
</div>
@endsection