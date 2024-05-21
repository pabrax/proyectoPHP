<!-- creado por: Daniel cardona arroyave -->

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
                <td>
                    <a href="{{route('users.edit',  $employee->id)}}" class="btn btn-success">edit</a>
                </td>
                </td>
                <td>
                    <form action="{{route('users.delete', $employee->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
