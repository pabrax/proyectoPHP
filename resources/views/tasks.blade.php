@extends('layouts.app')

@section('content')
<div class="container-fluid row p-0 m-0">
    <div class="col-6 m-0 p-0" style="width: 20%; height: 100vh;">
        @include('partials.navbar')
    </div>
    
    <div class="col">
        <h1 class="mb-3">Users view</h1>
        @include('layouts.task_table')
    </div>
</div>
@endsection