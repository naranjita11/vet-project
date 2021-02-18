<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Owner;

class OwnerTest extends TestCase
{
    use RefreshDatabase;

    public function testOwnerData()
    {
        Owner::create([
            "first_name" => "Jane",
            "last_name" => "Hill",
            "telephone" => "07878444333",
            "email" => "email@gmail.com",
            "address_1" => "addrline1",
            "town" => "nicetown",
            "postcode" => "BB11 11BB"
        ]);
        
        // get first owner back from DB
        $ownerFromDB = Owner::first();

        // check each field matches
        $this->assertSame("Jane", $ownerFromDB->first_name);
        $this->assertSame("Hill", $ownerFromDB->last_name);
        $this->assertSame("07878444333", $ownerFromDB->telephone);
        $this->assertSame("email@gmail.com", $ownerFromDB->email);
        $this->assertSame("addrline1", $ownerFromDB->address_1);
        $this->assertSame("nicetown", $ownerFromDB->town);
        $this->assertSame("BB11 11BB", $ownerFromDB->postcode);
    }
}
