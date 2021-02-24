<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public $timestamps = false;

    // using the belongsToMany() method
    // as it's a many-to-many relationship
    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }

    public static function fromStrings(array $strings) : Collection
    {
        //map to remove whitespace from strings,
        //make sure there are no duplicates with unique(),
        //firstOrCreate to match or create new treatment if not in DB
        //should return collection of treatment models from DB
        return collect($strings)->map(fn($str) => trim($str))
                                ->unique()
                                ->map(fn($str) => Treatment::firstOrCreate(["name" => $str]));
    }
}
