<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Notes App</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route ('todo.home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route ('tasks.index')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center mb-4">{{ $task->title }}</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Task Detail</h5>
            <!-- Static Description -->
            <p id="task-desc" class="card-text">{{ $task->detail }}</p>

            <!-- Edit Form (Initially Hidden) -->
            <form id="edit-form" action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-none">
                @csrf
                @method('PUT')
                <div class="form-group">
                    
                    <input type="text" name="detail" class="form-control" value="{{ $task->detail }}" required>
                </div>
                <button type="submit" class="btn btn-success mt-2 ">Save Changes</button>
            </form>

            <!-- Toggle Edit Button -->
            <button id="edit-btn" class="btn btn-secondary mt-2">Edit Description</button>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-4 ">Back to All Tasks</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle between view and edit mode
    document.getElementById('edit-btn').addEventListener('click', function() {
        let desc = document.getElementById('task-desc');
        let form = document.getElementById('edit-form');

        // Toggle visibility
        if (form.classList.contains('d-none')) {
            form.classList.remove('d-none');
            desc.classList.add('d-none');
            this.textContent = 'Cancel';
        } else {
            form.classList.add('d-none');
            desc.classList.remove('d-none');
            this.textContent = 'Edit Description';
        }
    });
</script>
</body>
</html>
