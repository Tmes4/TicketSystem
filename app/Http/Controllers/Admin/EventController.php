<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'location' => 'required',
            'time' => 'required',
            'date' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image',
            'description' => 'required',
        ]);

        $event = new Event();

        $event->title = $request->title;
        $event->location = $request->location;
        $event->time = $request->time;
        $event->date = $request->date;
        $event->price = $request->price;
        if ($request->hasFile('image')) {
            Storage::makeDirectory('public/images');
            $src = Storage::putFile('public/images', $request->file('image'));
            $src = str_replace('public', 'storage', $src);
            $event->image = $src;
        }
        $event->description = $request->description;

        $event->save();
        return redirect()->route('admin.viewEvents', $event);
    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit')
            ->with(compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $this->validate(request(), [
            'title' => 'required',
            'location' => 'required',
            'time' => 'required',
            'date' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image',
            'description' => 'required',
        ]);

        $event->title = $request->title;
        $event->location = $request->location;
        $event->time = $request->time;
        $event->date = $request->date;
        $event->price = $request->price;
        if ($request->hasFile('image')) {
            Storage::makeDirectory('public/images');
            $src = Storage::putFile('public/images', $request->file('image'));
            $src = str_replace('public', 'storage', $src);
            $event->image = $src;
        }   
        $event->description = $request->description;

        $event->save();
        return redirect()->route('admin.viewEvents', $event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.viewEvents');
    }

    public function upComing()
    {
        $events = Event::where('date', '>=', Carbon::today())->orderby("date")->get();
        return view('admin.events.viewEvents')
            ->with(compact('events'));
    }
}
