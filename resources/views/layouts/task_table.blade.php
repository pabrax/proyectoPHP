<!-- creado por: Daniel cardona arroyave -->

<div class="content_container col">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Id</td>
                <td>Task</td>
                <td>Description</td>
                <td>Employee</td>
            </tr>
        </thead>
    
        <tbody>
    
            @foreach ($tasks as $task)
            @if($task->employee)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->employee->name}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>