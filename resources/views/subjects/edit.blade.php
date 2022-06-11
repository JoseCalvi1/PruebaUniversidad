@extends('layouts.app')


@section('content')

<div class="container">
    <a href="{{ route('subjects.show', ['subject' => $subject->id]) }}" class="btn btn-outline-secondary mr-2 text-uppercase font-weight-bold m-4">
        Volver
    </a>

    <h2 class="text-center mb-5">Editar asignatura</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('subjects.update', ['subject' => $subject->id]) }}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Título asignatura</label>

                    <input type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        placeholder="Título asignatura"
                        value="{{ $subject->name }}"
                        />

                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="degree_id">Titulación</label>

                    <select name="degree_id" id="degree_id" class="form-control @error('degree_id') is-invalid @enderror">
                        @if ($subject->degree_id)
                            <option value="{{ $subject->degrees->id }}">{{ $subject->degrees->name }}</option>
                        @else
                            <option disabled selected>- Selecciona -</option>
                        @endif

                        @foreach ($degrees as $degree)
                            <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                        @endforeach
                    </select>

                        @error('degree_id')
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
                        value="{{ $subject->credits }}"
                        />

                        @error('credits')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="academicCourse">Curso académico</label>

                    <input type="number"
                        name="academicCourse"
                        class="form-control @error('academicCourse') is-invalid @enderror"
                        id="academicCourse"
                        placeholder="Curso académico perteneciente de la asignatura"
                        value="{{ $subject->academicCourse  }}"
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
                        value="{{ $subject->maxStudents }}"
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
</div>

@endsection

