<!-- creado por: Daniel cardona arroyave -->

<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

<?php

use App\Models\Employee;

$users = Employee::all();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
</head>

<body>
    <thead>
        <tr>
            <th>Id</th>
            <th>Task</th>
        <tr>
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
</body>

</html>