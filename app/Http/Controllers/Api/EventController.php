<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Property;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection(Event::all());
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(EventRequest $request)
    {
        return response()->json([
            'data' => new EventResource(Event::create($request->all()))
        ], 201);
    }
}
