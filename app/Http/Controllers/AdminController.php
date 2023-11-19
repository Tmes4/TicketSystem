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

    public function upComing()
    {
        $events = Event::where('date', '>=', Carbon::today())->get();
        return view('admin.viewEvents')
            ->with(compact('events'));
    }
}
