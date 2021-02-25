<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ["name", "type", "date_of_birth", "weight", "height", "biteyness", "owner_id"];

    public function owner()
    {
        // an animal belongs to an owner
        return $this->belongsTo(Owner::class);
    }

    public function dangerous()
    {
        if ($this->biteyness >= 3)
        {
            return "(Dangerous!!)";
        }
    }

    public function formattedWeight()
    {
        return "{$this->weight}kg";
    }

    public function formattedHeight()
    {
        return "{$this->height}m";
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

    // just accept an array of strings
    // we don't want to pass request in as there's no
    // reason models should know about about the request
    public function setTreatments(array $strings) : Animal
    {
        $treatments = Treatment::fromStrings($strings);

        // we're on an animal instance, so use $this
        // pass in collection of IDs
        $this->treatments()->sync($treatments->pluck("id"));

        // return $this in case we want to chain
        return $this;
    }

    
}
