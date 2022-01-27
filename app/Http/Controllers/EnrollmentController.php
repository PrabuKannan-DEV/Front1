<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class EnrollmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('enrollments.index');
    // }
    public function store()
    {
      $scheme_id = request()->scheme_id;
      $user_id =auth()->user()->id;
      $enrollment= Http::get(config('services.finance.host').'/deposits', ['scheme_id'=>$scheme_id,'user_id'=>$user_id]);
      $enrollment= json_decode($enrollment);
      return redirect()->route('home',)->with('message', 'You have deposited Successfully!! ') ;
    }
    public function withdraw($enrollment)
    {
      $user_id =auth()->user()->id;
      $data = Http::get(config('services.finance.host').'/enrollments/'.$enrollment.'/withdraw',['user_id'=>$user_id]);
      $data = json_decode($data);
      return redirect()->route('home',)->with('message', 'You have withdrawn your amount Successfully!! ') ;
    }
    public function show($enrollment)
    {
      $enrollment=Http::get(config('services.finance.host').'/enrollments/'.$enrollment)->object();
      $this->authorize('view', [User::class,$enrollment]);
      return view('enrollments.show', compact('enrollment'));
    }

}
