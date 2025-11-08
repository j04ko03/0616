<div class="task-backlog {{ $class }}" data-sprint="{{ $dataset }}">
    <span class="titulo-tarea">{{ $titulo }}</span>
    <span class="descripcion-tarea">{{ $descripcion }}</span>
    <span class="sprint-tarea">{{ $sprint ?? 'Sin sprint' }}</span>
    <span class="tag-tarea">
        @if (!empty($tags) && $tags->count())
            @foreach ($tags as $tag)
                <p class="tags" style="background-color:{{ $tag->color }}">{{ $tag->descripcion }}</p>
            @endforeach
        @else
        @endif
    </span>
    <span class="responsable-tarea">{{ $responsable }}</span>
    <span class="asignado-tarea">
        @if (!empty($asignados) && $asignados->count())
            @foreach ($asignados as $asignado)
                {{ $asignado->nombre }}@if (!$loop->last)
                    ,
                @endif
            @endforeach
        @else
            Sin asignar
        @endif
    </span>
    <span class="estado-tarea">{{ $estado }}</span>
</div>
