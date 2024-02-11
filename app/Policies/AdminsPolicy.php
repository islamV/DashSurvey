<?php

namespace App\Policies;

use App\Models\User;
use Dash\Policies\Policy;

class AdminsPolicy extends Policy
{
    protected $resource = 'admins';

}
