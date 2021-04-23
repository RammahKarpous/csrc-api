<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;

class EventController extends Controller
{

    use WithFaker;

    public function store()
    {
        $event = Event::create(array_merge($this->data(), [
            'slug' => 'event-' . $this->number()
        ]));

        return $event;
    }

    public function number($num = 5)
    {
        return rand(pow(10, $num-1), pow(10, $num)-1);
    }

    public function addTimes(Event $event)
    {
        $event->update(array_merge($this->data(), [
            'start_time' => request('start_time'),
            'end_time' => request('end_time')
        ]));

        return $event;
    }

    public function data()
    {
        return request()->validate([
            'meet_id' => 'required',
            'age_range' => 'required',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'gender' => 'required',
            'distance' => 'required',
            'stroke' => 'required',
            'round' => 'required',
        ]);
    }
}
