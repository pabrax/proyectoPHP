<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

  <!--aqui no se si va un include de login-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's tasks</title>
</head>
<body>
    <thead>
        <tr>
            <th>Id</th>
            <th>Task</th>
        <tr>
    </thead>

    <tbody>
        @foreach($tasks-> $task)
            @if(!task->assignedUser)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->titulo}}</td>
            <td>{{$task->descripcion}}</td>
            <td>{{$task->fecha_entrega}}</td>
        </tr>   
            @endif
        @endforeach
    </tbody> 
</body>
</html>