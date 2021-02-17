<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Owner;

class BananaTest extends TestCase
{
    public function testBananas()
    {
        $this->assertTrue("No, we have no bananas" === Owner::haveWeBananas(0));
        $this->assertTrue("Yes, we have 2 bananas" === Owner::haveWeBananas(2));
        $this->assertTrue("Yes, we have 1 banana" === Owner::haveWeBananas(1));
        $this->assertTrue("Yes, we have -12 bananas" === Owner::haveWeBananas(-12));
    }
}
