<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $test = Test::find(1);

        // $this->authorize('view', $user, $test);
        request()->user()->cannot('view', $user, $test);
        // Gate::authorize('view', $user, $test);

        dd();
        return view('test.index');
    }
}
