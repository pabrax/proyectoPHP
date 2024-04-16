<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

<!--aqui no se si va un include de login-->





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