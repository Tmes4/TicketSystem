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
            // $validatedData = $request->validate([
            //     'title' => 'required|max:255',
            //     'location' => 'required|max:255',
            //     'time' => 'required',
            //     'date' => 'required|date',
            //     'price' => 'required|numeric',
            //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            //     'description' => 'required',
            // ]);
        
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
            //     $image->storeAs('public/images', $imageName);
            //     $imageUrl = asset('storage/images/' . $imageName);
            // }
        
            // $event = new Event([
            //     'title' => $validatedData['title'],
            //     'location' => $validatedData['location'],
            //     'time' => $validatedData['time'],
            //     'date' => $validatedData['date'],
            //     'price' => $validatedData['price'],
            //     'imageUrl' => $imageUrl ?? '',
            //     'description' => $validatedData['description'],
            // ]);
        
            // Rest van je code hieronder
        
        
        $this->validate(request(), [
            'title' => 'required',
            'location' => 'required',
            'time' => 'required',
            'date' => 'required',
            'price' => 'required|numeric|min:0',
            // 'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            $event->imageUrl = $src;
        }
        Storage::makeDirectory('public/images');

        // Afbeelding opslaan
        $imagePath = $request->file('image')->store('public/images');

        // Pad aanpassen voor weergave in de view
        $src = str_replace('public', 'storage', $imagePath);

        // Sla het pad op in de database
        $event->imageUrl = $src;
        $event->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Genereer een unieke bestandsnaam
            $image->storeAs('public/images', $imageName); // Sla de afbeelding op in de 'public/images' map
            $imageUrl = asset('storage/images/' . $imageName); // Genereer de URL voor de opgeslagen afbeelding
        }

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
            $event->imageUrl = $src;
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
