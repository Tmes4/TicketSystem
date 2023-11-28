<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }

}
