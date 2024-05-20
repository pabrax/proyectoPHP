<!-- creado por: Daniel cardona arroyave -->

<div class="content_container col">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Employee Id</td>
                <td>Employee_name</td>
                <td>date</td>
                <td>entry_time</td>
                <td>exit_time</td>
            </tr>
        </thead>
    
        <tbody>
    
            @foreach ($assists as $assist)
            <tr>
                <td>{{$assist->employee_id}}</td>
                <td>{{$assist->employee->name}}</td>
                <td>{{$assist->date}}</td>
                <td>{{$assist->entry_time}}</td>
                <td>{{$assist->exit_time}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>