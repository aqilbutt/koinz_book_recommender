<?php

namespace Tests\Unit;

use App\Helper\UserHelper\UserHelper;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic test of user model.
     *
     * @return void
     */
    public function testPluckUserNames()
    {
        User::factory()->count(2)->create();
        $userHelper = new UserHelper();
        $userNames = $userHelper->pluckUserNames();
        $expectedUserNames = User::pluck('name', 'id');
        $this->assertEquals($expectedUserNames, $userNames); // compare both of them
    }
}
