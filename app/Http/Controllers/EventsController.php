<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class EventsController extends Controller
{
    public function index() : Response
    {
        return Inertia::render('App/Index');
    }
    // public function show(Event $event)
    // {
    //     return Inertia::render('Event/Show', [
    //         'event' => $event->only(
    //             'id',
    //             'title',
    //             'start_date',
    //             'description'
    //         ),
    //     ]);
    // }
}
