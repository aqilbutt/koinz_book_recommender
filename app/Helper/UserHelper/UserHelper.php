<?php

namespace App\Helper\UserHelper;

use App\Models\User;

/**
 * Class responsible to handle methods related to 
 * users usecases
 */
class UserHelper
{

    /**
     * get overall user names to show in dropdown
     * 
     * @return array
     */
    public function pluckUserNames(){
        return User::pluck('name', 'id');
    }
}
