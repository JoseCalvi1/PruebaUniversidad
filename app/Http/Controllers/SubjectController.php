<?php

namespace App\Http\Controllers;

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
        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
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
            'degree' => 'required',
            'credits' => 'required',
            'academicCourse' => 'required',
            'maxStudents' => 'required',
        ]);


        // Almacenar datos en la BD (sin modelos)
        DB::table('subjects')->insert([
            'name' => $data['name'],
            'degree' => $data['degree'],
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $students = DB::table('usersubject')->where('subject_id', $subject->id)->get();
        $suscribe = $students->where('user_id', Auth::user()->id);

        return view('subjects.show', compact('subject', 'students', 'suscribe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
