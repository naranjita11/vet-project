<?php

namespace App;

class FizzBuzz
{
    public function forNumber($x)
    {
        $wordzz = ($x % 3 === 0) ? "Fizz" : "";

        $wordzz = ($x % 5 === 0) ? "{$wordzz}Buzz" : $wordzz;

        $wordzz = ($x % 7 === 0) ? "{$wordzz}Rarr" : $wordzz;

        return ($wordzz === "" ? "$x" : "$wordzz");
    }


}