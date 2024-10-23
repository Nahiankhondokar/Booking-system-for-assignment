<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponStoreRequest;
use Illuminate\Http\Request;

class CustomFormController extends Controller
{
    public function index()
    {
        return view('custom_form');
    }
}