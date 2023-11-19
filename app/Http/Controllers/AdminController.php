<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }

    public function upComing()
    {
        $events = Event::where('date', '>=', Carbon::today())->get();
        return view('admin.viewEvents')
            ->with(compact('events'));
    }
}
