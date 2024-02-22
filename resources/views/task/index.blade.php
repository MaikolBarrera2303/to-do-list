@extends("layouts.app")

@section("title","Notas")

@section("content")

    @include("layouts.message")

    @include("task.modals.create")

    <div class="align-items-center text-center" style="min-height: 10vh; display: flex; justify-content: center; margin-bottom: -100px;margin-top: 40px">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#create-task">
            <i class="bi bi-journal-plus"></i>
            Crear Tarea
        </button>
    </div>

    <div class="row" style="margin: 8rem 12rem 0 12rem;">
        <div class="row">

            @foreach($tasks as $task)
                <div class="col-4" style="margin-bottom: 20px">
                    <div class="card">
                        <form action="{{ route("task.destroy",$task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-close" style="margin: 6px 0 10px 92%" aria-label="Close"
                                    onclick="return window.confirm('¿Quiere eliminar {{ $task->title }}?')">
                            </button>
                        </form>
                        <div class="card-body text-center" style="margin-top: -16px">
                            @if($task->state === 1)
                                <span class="badge text-bg-success mb-2">Completa</span>
                            @else
                                <span class="badge text-bg-warning mb-2">Incompleta</span>
                            @endif
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <p class="card-text text-truncate"> {{ $task->description }}</p>

                            <button type="button" class="btn" style="color: #0dcaf0" title="Ver"
                                    data-bs-toggle="modal" data-bs-target="#show-task{{ $task->id }}">
                                <i class="bi bi-eye"></i>
                            </button>

                            <button type="button" class="btn" style="color: #fd7e14" title="Actualizar"
                                    data-bs-toggle="modal" data-bs-target="#edit-task{{ $task->id }}">
                                <i class="bi bi-pen"></i>
                            </button>

                            <form class="btn p-0" action="{{ route("task.update",$task->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if($task->state === 1)
                                    <button type="submit" class="btn text-warning"
                                            title="Incompletar" name="state" value="0">
                                        <i class="bi bi-exclamation-circle"></i>
                                    </button>
                                @else
                                    <button type="submit" class="btn text-success"
                                            title="Completar" name="state" value="1">
                                        <i class="bi bi-check-circle"></i>
                                    </button>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>

                @include("task.modals.show")

                @include("task.modals.edit")

            @endforeach

        </div>
    </div>

@endsection

