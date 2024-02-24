<?php

namespace App\Policies;

use App\Models\AdminGroup;
use Dash\Policies\Policy;


class AdminGroupsPolicy  extends Policy 
{
   
    protected $resource = 'admin_groups';

}
