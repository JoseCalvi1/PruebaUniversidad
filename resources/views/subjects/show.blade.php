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
                @if (count($suscribe) > 0)
                    Ya está inscrito en esta asignatura
                @elseif (count($students) < $subject->maxStudents)
                    <span style="color: green;">¡Quedan {{ $subject->maxStudents-count($students) }} plazas libres!</span>
                    <form method="POST" action="{{ route('subjects.suscribe', ['subject' => $subject->id]) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group py-2">
                            <input type="submit" class="btn btn-primary" value="Inscribirse">
                        </div>
                    </form>
                @else
                    <span style="color: rgb(128, 0, 0);">Lo sentimos, se han agotado las plazas</span>
                @endif
            </div>
    </div>
</div>
@endsection
