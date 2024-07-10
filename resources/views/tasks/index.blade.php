@extends('tasks.layout')

@section('content')
<div class="container">
    <main>
        <h2 class="display-6 text-center mb-4" style="color: #ff69b4;">Tareas</h2>
        <a href="tasks/create" class="btn btn-outline-warning mb-3" style="border-color: black; color: #ffcc00;">Nueva
            Tarea</a>
        <div class="table-responsive">
            <table class="table text-left" style="background-color: #ffe4e1; border: 1px solid black;">
                <thead>
                    <tr style="background-color: #ffcccb;">
                        <th style="width: 5%; color: #ff69b4; border: 1px solid black;">ID</th>
                        <th style="width: 22%; color: #ff69b4; border: 1px solid black;">Nombre</th>
                        <th style="width: 22%; color: #ff69b4; border: 1px solid black;">Descripción</th>
                        <th style="width: 22%; color: #ff69b4; border: 1px solid black;">Usuario</th>
                        <th style="width: 22%; color: #ff69b4; border: 1px solid black;">Prioridad</th>
                        <th style="width: 22%; color: #ff69b4; border: 1px solid black;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="{{ $task->completed ? 'table-success' : '' }}" style="border: 1px solid black;">
                            <th scope="row" style="border: 1px solid black;">{{ $task->id }}</th>
                            <td style="border: 1px solid black;"><a href="/tasks/{{ $task->id }}"
                                    style="color: #ff69b4;">{{ $task->name }}</a></td>
                            <td style="border: 1px solid black;">{{ $task->description }}</td>
                            <td style="border: 1px solid black;">{{ $task->user->name }}</td>
                            <td style="border: 1px solid black;">{{ $task->priority->name }}</td>
                            <td style="border: 1px solid black;">
                                @if ($task->completed)
                                    <span class="badge bg-success"
                                        style="background-color: #ffffe0; color: #ffcc00;">Completada</span>
                                @else
                                    <form action="/tasks/{{ $task->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline-success"
                                            style="border-color: black; color: #ffcc00;">Completada</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection