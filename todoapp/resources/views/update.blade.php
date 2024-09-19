<form id="edit-form" action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-none">
    @csrf
    @method('PUT')
    <div class="form-group">
        <!-- <label for="description">Edit Description</label> -->
        <input type="text" name="detail" class="form-control" value="{{ $task->detail }}" required>
    </div>
    <button type="submit" class="btn btn-success mt-2">Save Changes</button>
</form>
