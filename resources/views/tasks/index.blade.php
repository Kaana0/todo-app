@extends('layout')

@section('content')
    <h1>ToDo List</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Enter task title">
        <button type="submit">Add Task</button>
    </form>

    @if($tasks->count())
        <ul>
            @foreach($tasks as $task)
                <li>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{ $task->title }}
                        <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No tasks available.</p>
    @endif
@endsection
