<form action="{{route('tasks.update')}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control">
    </div>
</form>