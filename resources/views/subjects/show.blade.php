@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('subjects.index') }}" class="btn btn-outline-secondary mr-2 text-uppercase font-weight-bold m-4">
        Volver
    </a>
    @if (Auth::user()->isTeacher)
        <a href="{{ route('subjects.edit', ['subject' => $subject->id]) }}" class="btn btn-secondary mr-2 text-uppercase font-weight-bold m-4">
            Editar
        </a>
        <form method="POST" action="{{ route('subjects.destroy', ['subject' => $subject->id]) }}" style="display: contents;">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger mr-2 text-uppercase font-weight-bold m-4 flex-right">Eliminar asignatura</button>
        </form>
    @endif
    <div class="row justify-content-center">
            <div class="col-md-6 py-2">
                <div>
                    <h3>{{ $subject->name }}</h3>
                    <p>Grado en {{ $subject->degrees->name }}</p>
                    <p>Nº de créditos: {{ $subject->credits }}</p>
                    <p>Curso Académico: {{ $subject->academicCourse }}º</p>
                    <p>Máximo de estudiantes: {{ $subject->maxStudents }}</p>
                </div>
            </div>
            <div class="col-md-6 py-2">
                @if (Auth::user()->isTeacher)
                <h3>Listado de alumnos</h3>
                    @if (count($studentsA) > 0)
                        @foreach ($studentsA as $student)
                            <p>{{ $student->name.' '.$student->surname.' ('.date('Y')-$student->birthyear.' años)' }}</p>
                        @endforeach
                    @else
                        <p>Aún no hay estudiantes matriculados en esta asignatura.</p>
                    @endif
                @elseif (count($suscribe) > 0)
                    <h3>Disponibilidad</h3>
                    Ya está inscrito en esta asignatura
                @elseif (count($students) < $subject->maxStudents)
                    <h3>Disponibilidad</h3>
                    <span style="color: green;">¡Quedan {{ $subject->maxStudents-count($students) }} plazas libres!</span>
                    <form method="POST" action="{{ route('subjects.suscribe', ['subject' => $subject->id]) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group py-2">
                            <input type="submit" class="btn btn-primary" value="Inscribirse">
                        </div>
                    </form>
                @else
                    <h3>Disponibilidad</h3>
                    <span style="color: rgb(128, 0, 0);">Lo sentimos, se han agotado las plazas</span>
                @endif
            </div>
    </div>
</div>
@endsection
