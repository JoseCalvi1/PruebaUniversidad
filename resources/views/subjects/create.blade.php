@extends('layouts.app')


@section('content')

<a href="{{ route('subjects.index') }}" class="btn btn-outline-secondary mr-2 text-uppercase font-weight-bold m-4">
    Volver
</a>

<h2 class="text-center mb-5">Crear nueva asignatura</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <form method="POST" action="{{ route('subjects.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
            <div class="form-group">
                <label for="name">Título asignatura</label>

                <input type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    placeholder="Título asignatura"
                    value="{{old('name')}}"
                    />

                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="degree">Titulación</label>

                <input type="text"
                    name="degree"
                    class="form-control @error('degree') is-invalid @enderror"
                    id="degree"
                    placeholder="Titulación a la que pertenece"
                    value="{{old('degree')}}"
                    />

                    @error('degree')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="credits">Créditos</label>

                <input type="number"
                    name="credits"
                    class="form-control @error('credits') is-invalid @enderror"
                    id="credits"
                    placeholder="Nº de créditos"
                    value="{{old('credits')}}"
                    />

                    @error('credits')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="academicCourse">Curso académico</label>

                <input type="academicCourse"
                    name="academicCourse"
                    class="form-control @error('academicCourse') is-invalid @enderror"
                    id="academicCourse"
                    placeholder="Curso académico perteneciente de la asignatura"
                    value="{{old('academicCourse')}}"
                    />

                    @error('academicCourse')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="maxStudents">Alumnos máximos</label>

                <input type="number"
                    name="maxStudents"
                    class="form-control @error('maxStudents') is-invalid @enderror"
                    id="maxStudents"
                    placeholder="Alumnos máximos admitidos en esta asignatura"
                    value="{{old('maxStudents')}}"
                    />

                    @error('maxStudents')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>


            <div class="form-group py-2">
                <input type="submit" class="btn btn-secondary" value="Agregar asignatura">
            </div>
        </form>
    </div>
</div>

@endsection

