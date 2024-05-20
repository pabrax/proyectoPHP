<!-- creado por: Daniel cardona arroyave -->

<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

<?php

use App\Models\Employee;

$users = Employee::all();

?>

<div class="content_container col">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>User Type</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $employee)
            <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->lastname}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->user_type}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
