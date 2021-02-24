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
            return "Dangerous!!";
        }

        return "No prob";
    }

    public function formattedWeight()
    {
        return "{$this->weight}kg";
    }

    public function formattedHeight()
    {
        return "{$this->height}m";
    }

    
}
