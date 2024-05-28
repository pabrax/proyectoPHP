<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('tasks.update', $task->id)}}" method="POST" class="d-flex">
        @csrf
        @method('PUT')
        <div class="mb-3 me-5">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>
        <div class="mb-3 me-5">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $task->description) }}" required>
        </div>
        <div class="mb-3 me-5">
            <label for="employee_id" class="form-label">Employee</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                @foreach ($employees as $employee)
                <option value="{{$employee->id}}" {{ $task->employee_id == $employee->id ? 'selected' : '' }}>{{$employee->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary me-3  align-self-center">Update</button>
</div>