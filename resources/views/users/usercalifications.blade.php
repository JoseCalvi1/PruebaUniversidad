@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Mis calificaciones</h2>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Asignatura</th>
                <th scope="col">1ª Convocatoria</th>
                <th scope="col">2ª Convocatoria</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($mySubjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->firstTest }}</td>
                        <td>{{ $subject->secondTest }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>

@endsection
