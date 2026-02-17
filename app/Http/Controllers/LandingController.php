<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        return Inertia::render('Landing', [
            'brand' => [
                'name' => 'Print on the wall',
                'slogan' => 'You think it, we print it',
                'primary' => '#c22229',
            ],
        ]);
    }
}