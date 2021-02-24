<?php

namespace App\Http\Controllers\API\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\AnimalRequest;
use App\Http\Requests\API\AnimalUpdateRequest;
use App\Models\Owner;
use App\Models\Animal;
use App\Http\Resources\API\AnimalResource;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // use Route Model Binding to get the specified owner
    public function index(Owner $owner)
    {
    // return all animals for a specific owner
    // uses Eloquent's magic relationship properties
    return AnimalResource::collection($owner->animals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


            // get the $owner using Route Model Binding
    public function store(AnimalRequest $request, Owner $owner)
    {
    $data = $request->all();

    // create a new animal with the data
    $animal = new Animal($data);

    // associate the animal with an owner
    $animal->owner()->associate($owner);

    // save the animal in the DB
    $animal->save();

    // return the new $animal
    return new AnimalResource($animal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // need to enter Owner $owner because of Route Model Binding
    public function show(Owner $owner, Animal $animal)
    {
        return new AnimalResource($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalUpdateRequest $request, Owner $owner, Animal $animal)
    {
        $data = $request->all();
      
        // update the model with new data
        $animal->fill($data);
      
        // don't need to associate with owner as shouldn't have changed
        // but $owner required for route model binding
        // save the animal
        $animal->save();
      
        // return the updated animal
        return new AnimalResource($animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner, Animal $animal)
    {
        $animal->delete();
        return response(null, 204);
    }
}
