<link rel="stylesheet" href="{{ url('/css/taskItemProject.css') }}">

<div class="task-card filter-sprint" data-sprint="{{ $sprint }}">
    <span>
        <p>{{ $titulo }}</p>
        <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path
                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
            </svg>
        </button>
    </span>
    <span class="tags-container">
        @if (!empty($tags) && $tags->count())
            @foreach ($tags as $tag)
                <p class="tags" style="background-color:{{ $tag->color }}">{{ $tag->descripcion }}</p>
            @endforeach
        @else
            Sin tags
        @endif
    </span>
    <p>{{ $descripcion }}</p>
    <span>
        <p>{{ $responsable }}
        </p>
        <p>{{ \Carbon\Carbon::parse($fechaEntrega)->format('Y-m-d') }}</p>
    </span>
</div>
