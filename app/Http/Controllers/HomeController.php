<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function califications()
    {
        // Traer las notas de los alumnos y sus asignaturas
        $mySubjects = DB::table('usersubject')
                        ->join('subjects', 'subjects.id', '=', 'usersubject.subject_id')
                        ->join('users', 'users.id', '=', 'usersubject.user_id')
                        ->select('subjects.*', 'usersubject.*', 'users.name AS username')
                        ->orderBy('subjects.name')
                        ->get();

        return view('users.califications', compact('mySubjects'));
    }

    public function usercalifications()
    {
        // Traer las notas del alumno logeado en sus asginaturas
        $mySubjects = DB::table('usersubject')->where('user_id', Auth::user()->id)
                        ->join('subjects', 'subjects.id', '=', 'usersubject.subject_id')
                        ->select('subjects.*', 'usersubject.*')
                        ->get();


        return view('users.usercalifications', compact('mySubjects'));
    }
}
