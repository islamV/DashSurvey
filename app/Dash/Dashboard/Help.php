<?php
namespace App\Dash\Dashboard;
use Dash\Resource;
use Dash\Extras\Inputs\HTML;
use Dash\Extras\Inputs\InputOptions\Select;

use App\Dash\Metrics\Charts\Users;

//use Dash\Extras\Inputs\HTML;
use App\Dash\Metrics\Values\AllUsers;
use App\Dash\Metrics\Values\AllAdmins;
use App\Dash\Metrics\Values\AllAdminGroups;
use App\Dash\Metrics\Values\AllAdminGroupRoles;

use Modules\complaints\Dash\Metrics\Charts\Compliants;
use Modules\surveys\Dash\Metrics\Charts\Surveys;

class Help extends Resource {

	/**
	 * add your card here by Card , HTML Class
	 * or by view instnance render blade file
	 * @return array
	 */
	public static function cards() {
		return [
            // (new AllAdmins)->render(),
            // (new AllUsers)->render(),
            // (new AllAdminGroups)->render(),
            // (new AllAdminGroupRoles)->render(),
		// 	(new Users)->render("users"),
		//  (new Surveys)->render("usrvey"),
		      (new Surveys)->render("surveys"),
		      (new Compliants)->render("Compliants"),
		

		];
	}

}
