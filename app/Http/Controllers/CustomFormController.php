<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomFormController extends Controller
{
    public function index()
    {
        return view('custom_form');
    }

    public function store(Request $request)
    {
       dd($request->all);
    }
}
