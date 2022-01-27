<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SchemeController extends Controller
{
    public function index()
    {
        $user= auth()->user();
        $schemes = Http::get(config('services.finance.host').'/schemes');
        $schemes = json_decode($schemes);
        return view('schemes.index', compact('schemes','user'));
    }
    public function create()
    {
        return view('schemes.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'amount'=>'required|numeric|min:100000|max:1000000',
            'duration'=>'required|numeric|min:12|max:60',
            'interest'=>'required|numeric|max:100',
        ]);
        $scheme=  Http::post(config('services.finance.host').'/schemes', ['data'=>$data]);
        $scheme = json_decode($scheme);
        return redirect()->route('schemes.show', ['scheme'=>$scheme->id]);
    }
    public function show($scheme_id)
    {
        $scheme =  Http::get(config('services.finance.host').'/schemes/'.$scheme_id);
        $scheme = json_decode($scheme);
        return view('schemes.show', compact('scheme'));
    }
}
