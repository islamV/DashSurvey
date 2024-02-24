<?php

namespace App\Policies;

use App\Models\User;
use Dash\Policies\Policy;
class AdminGroupRolesPolicy  extends Policy

{
	protected $resource = 'admin_group_role';
 
}
