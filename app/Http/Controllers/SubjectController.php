<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Asignaturas matriculadas por el alumno;
        $userSubjects = Auth::user()->subjects()->get();

        // Asignaturas no matriculadas por el
        $subjects = Subject::whereNotExists(function($query)
            {
                $query->select(DB::raw(1))
                      ->from('usersubject')
                      ->whereRaw('usersubject.subject_id = subjects.id')
                      ->where('usersubject.user_id', '=', Auth::user()->id);
            })
            ->get();

        return view('subjects.index', compact('subjects', 'userSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $degrees = Degree::all();

        return view('subjects.create', compact('degrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación
        $data = $request->validate([
            'name' => 'required|min:3',
            'degree_id' => 'required',
            'credits' => 'required',
            'academicCourse' => 'required',
            'maxStudents' => 'required',
        ]);


        // Almacenar datos en la BD (sin modelos)
        DB::table('subjects')->insert([
            'name' => $data['name'],
            'degree_id' => $data['degree_id'],
            'credits' => $data['credits'],
            'academicCourse' => $data['academicCourse'],
            'maxStudents' => $data['maxStudents'],
        ]);

        return redirect()->action('App\Http\Controllers\SubjectController@index');
    }

    public function suscribe(Request $request, Subject $subject)
    {
        DB::table('usersubject')->insert([
            'user_id' => Auth::user()->id,
            'subject_id' => $subject->id,
        ]);

        return redirect()->back();
    }

    public function test(Request $request, Subject $subject)
    {
        $user = Auth::user();
        $test = $user->subjects()->where('subject_id', $subject->id)->first();
        if (!$test->pivot->firstTest) {
            $test->pivot->firstTest = random_int(0, 10);
        } else {
            $test->pivot->secondTest = random_int(0, 10);
        }
        $test->pivot->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $students = DB::table('usersubject')->where('subject_id', $subject->id)->get();
        $suscribe = $students->where('user_id', Auth::user()->id)->first();
        $studentsA = $subject->users()->get();

        return view('subjects.show', compact('subject', 'students', 'suscribe', 'studentsA'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $degrees = Degree::all();

        return view('subjects.edit', compact('subject', 'degrees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        // Validación
        $data = $request->validate([
            'name' => 'required|min:3',
            'degree_id' => 'required',
            'credits' => 'required',
            'academicCourse' => 'required',
            'maxStudents' => 'required',
        ]);

            // Asignar los valores
            $subject->name = $data['name'];
            $subject->degree_id = $data['degree_id'];
            $subject->credits = $data['credits'];
            $subject->academicCourse = $data['academicCourse'];
            $subject->maxStudents = $data['maxStudents'];

            $subject->save();

        return redirect()->action('App\Http\Controllers\SubjectController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject = Subject::find($subject->id);
        $subject->delete();
        return redirect()->action('App\Http\Controllers\SubjectController@index');
    }
}
