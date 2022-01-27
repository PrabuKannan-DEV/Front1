<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {  
         if(request()->status){
        $status = request()->status;
        }
        else{
            $status = '';
        }
        $user_id =auth()->user()->id;
        $enrollments = Http::get(config('services.finance.host').'/users/'.$user_id.'/deposits', ['status'=>$status]);
        $enrollments = json_decode($enrollments);
        return view('index', compact('enrollments'));
    }
}