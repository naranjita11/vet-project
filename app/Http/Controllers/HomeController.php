<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{

    public function timeOfDay()
    {
        $timeNow = Carbon::now();
        $timeNow = $timeNow->hour;
        
        if ($timeNow > 0 && $timeNow < 12) {
            return "Morning";
        }

        else if ($timeNow >= 12 && $timeNow < 17) {
            return "Afternoon";
        }

        else return "Evening";
    }

    public function index()
    {
        $greeting = "Good {$this->timeOfDay()}!";
        
        return view("welcome", [
            "greeting" => $greeting
        ]);
    }

    public function show(Owner $owner)
    {
        return view("owners/show", [
            "owner" => $owner
        ]);
    }
}
