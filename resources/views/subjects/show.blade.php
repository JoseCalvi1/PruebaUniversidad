@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('subjects.index') }}" class="btn btn-outline-secondary mr-2 text-uppercase font-weight-bold m-4">
        Volver
    </a>
    <div class="row justify-content-center">
            <div class="col-md-6 py-2">
                <div>
                    <h3>{{ $subject->name }}</h3>
                    <p>Grado en {{ $subject->degree }}</p>
                    <p>Nº de créditos: {{ $subject->credits }}</p>
                    <p>Curso Académico: {{ $subject->academicCourse }}º</p>
                    <p>Máximo de estudiantes: {{ $subject->maxStudents }}</p>
                </div>
            </div>
            <div class="col-md-6 py-2">
                <h3>Disponibilidad</h3>
            </div>
    </div>
</div>
@endsection
