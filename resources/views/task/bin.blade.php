@extends("layouts.app")

@section("title","Papelera")

@section("content")

    @include("layouts.message")

    <div class="row" style="margin: 8rem 12rem 0 12rem;">
        <div class="row">

            @forelse($tasks as $task)
                <div class="col-4" style="margin-bottom: 20px">
                    <div class="card">

                        <form action="{{ route("task.forceDelete",$task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-close" style="margin: 6px 0 10px 92%" aria-label="Close"
                                    onclick="return window.confirm('¿Quiere eliminar definitivamente {{ $task->title }}?')">
                            </button>
                        </form>

                        <div class="card-body text-center">

                            @if($task->state === 1)
                                <span class="badge text-bg-success mb-2">Completa</span>
                            @else
                                <span class="badge text-bg-warning mb-2">Incompleta</span>
                            @endif

                            <h5 class="card-title">{{ $task->title }}</h5>
                            <p class="card-text text-truncate"> {{ $task->description }}</p>

                            <form method="post" action="{{ route("task.restore",$task->id) }}">
                                @csrf
                                <button class="btn btn-link link-success" type="submit">
                                    <span class="h6">Restablecer</span>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            @empty
                <h2 class="text-center mt-4">Papelera Vacia</h2>
            @endforelse

        </div>
    </div>

@endsection

