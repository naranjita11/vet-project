<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ["first_name", "last_name", "telephone", "email", "address_1", "address_2", "town", "postcode"];

    public function fullName()
    {
        return ("{$this->first_name} {$this->last_name}");
    }

    public function fullAddress()
    {
        // array_filter function filters out empty fields
        $addressParts = array_filter([
            $this->address_1,
            $this->address_2,
            $this->town,
            $this->postcode
        ]);

        // string method implode() joins array elements with a string where you pass in the separator first ", " then the array to be joined.
        return implode(", ", $addressParts); 
    }


    public function formattedPhoneNumber()
    {
        $str1 = substr($this->telephone, 0, 5);
        $str2 = substr($this->telephone, 5, 3);
        $str3 = substr($this->telephone, 8, 3);

        return "{$str1} {$str2} {$str3}";
    }


    public static function haveWeBananas($number)
    {
        if ($number === 0) {
            return "No, we have no bananas";
        }

        if ($number === 1) {
            return "Yes, we have 1 banana";
        }
    
        return "Yes, we have {$number} bananas";
    }

    public function animals()
    {
        // use hasMany relationship method
        return $this->hasMany(Animal::class);
    }


}
