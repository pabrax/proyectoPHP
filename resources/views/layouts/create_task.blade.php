
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="employee_id">Employee:</label>
        <select name="employee_id" id="employee_id" class="form-control" required>
            @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Create</button>
</form>