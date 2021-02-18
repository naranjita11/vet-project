<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function index()
    {
        return view("owners/index", [
            // pass in all the owners
            "owners" => Owner::all(),
        ]);
    }

    public function show($id)
    {
        $owner = Owner::find($id);
    
        return view("owners/show", [
            "owner" => $owner
        ]);
    }

}
