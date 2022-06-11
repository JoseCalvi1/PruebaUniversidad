@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Campus virtual</h2>
    @if (Auth::user()->isTeacher)
        <a href="{{ route('subjects.create') }}" class="btn btn-outline-secondary mr-2 mb-4 text-uppercase font-weight-bold">
            Agregar asignatura
        </a>
    @else
    <div class="row pb-5">
        <h2>Mis matrículas</h2>
        @if (count($userSubjects) > 0)
            @foreach ($userSubjects as $usersubject)
            <div class="col-md-3 py-2">
                <div class="userSubjectCard">
                    <h3>{{ $usersubject->name }}</h3>
                    <p>Grado en {{ $usersubject->degree }}</p>
                    <p>Nº de créditos: {{ $usersubject->credits }}</p>
                    <p>Curso Académico: {{ $usersubject->academicCourse }}º</p>
                    <p>Máximo de estudiantes: {{ $usersubject->maxStudents }}</p>
                    <a href="{{ route('subjects.show', ['subject' => $usersubject->id]) }}" class="d-block font-weight-bold text-uppercase pt-2 pb-2 text-center userSubjectButton">Ver asignatura</a>
                </div>
            </div>
            @endforeach
        @else
            <p>No está matriculado/a de ninguna asignatura</p>
        @endif


    </div>
    @endif

    <div class="row">
        <h2>Todas las asignaturas</h2>
        @foreach ($subjects as $subject)
            <div class="col-md-3 py-2">
                <div class="subjectCard">
                    <h3>{{ $subject->name }}</h3>
                    <p>Grado en {{ $subject->degrees->name }}</p>
                    <p>Nº de créditos: {{ $subject->credits }}</p>
                    <p>Curso Académico: {{ $subject->academicCourse }}º</p>
                    <p>Máximo de estudiantes: {{ $subject->maxStudents }}</p>
                    <a href="{{ route('subjects.show', ['subject' => $subject->id]) }}" class="d-block font-weight-bold text-uppercase pt-2 pb-2 text-center subjectButton">Ver asignatura</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
