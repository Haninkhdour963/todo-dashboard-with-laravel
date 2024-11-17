<!-- resources/views/admin/tasks/index.blade.php -->


@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Task List</h2>
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Completed</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <input type="checkbox" @if($task->completed) checked @endif disabled>
                    </td>
                    <td>
                        <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
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
@endsection
