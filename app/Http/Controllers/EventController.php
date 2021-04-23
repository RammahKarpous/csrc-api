<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store()
    {
        $event = Event::create([
            'meet_id' => request('meet_id'),
            'age_range' => request('age_range'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'gender' => request('gender'),
            'distance' => request('distance'),
            'stroke' => request('stroke'),
            'round' => request('round'),
        ]);

        return $event;
    }
}
