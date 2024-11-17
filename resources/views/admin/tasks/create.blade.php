<!-- resources/views/admin/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Task</h2>

        <form action="{{ route('admin.tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection
