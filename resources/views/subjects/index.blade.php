@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Asignaturas</h2>
    @if (Auth::user()->isTeacher)
        <a href="{{ route('subjects.create') }}" class="btn btn-outline-secondary mr-2 mb-4 text-uppercase font-weight-bold">
            Agregar asignatura
        </a>
    @endif

    <div class="row justify-content-center">
        @foreach ($subjects as $subject)
            <div class="col-md-3 py-2">
                <div class="subjectCard">
                    <h3>{{ $subject->name }}</h3>
                    <p>Grado en {{ $subject->degree }}</p>
                    <p>Nº de créditos: {{ $subject->credits }}</p>
                    <p>Curso Académico: {{ $subject->academicCourse }}º</p>
                    <p>Máximo de estudiantes: {{ $subject->maxStudents }}</p>
                    <a href="{{ route('subjects.show', ['subject' => $subject->id]) }}" class="d-block font-weight-bold text-uppercase pt-2 pb-2 text-center subjectButton">Ver disponibilidad</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
