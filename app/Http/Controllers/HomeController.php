<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function timeOfDay()
    {
        $timeNow = Carbon::now();
        $timeNow = $timeNow->hour;
        
        if ($timeNow < 12) {
            return "Morning";
        }

        if ($timeNow < 17) {
            return "Afternoon";
        }

        return "Evening";
    }

    public function index()
    {
        $greeting = "Good {$this->timeOfDay()}!";
        
        return view("welcome", [
            "greeting" => $greeting
        ]);
    }
}
