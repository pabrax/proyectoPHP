<!-- creado por: Daniel cardona arroyave -->

<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">


<?php

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$tasks = Task::where('employee_id', $user->id)->get();

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's tasks</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Task</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($tasks as $task)
            @if($task->employee)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>