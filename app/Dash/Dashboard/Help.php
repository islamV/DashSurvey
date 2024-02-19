<?php
namespace App\Dash\Dashboard;
use Dash\Resource;
use Dash\Extras\Inputs\HTML;
use App\Dash\Metrics\Charts\Users;
use App\Dash\Metrics\Charts\Surveys;
//use Dash\Extras\Inputs\HTML;
use App\Dash\Metrics\Values\AllUsers;
use App\Dash\Metrics\Values\AllAdmins;
use App\Dash\Metrics\Values\AllAdminGroups;
use App\Dash\Metrics\Values\AllAdminGroupRoles;


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
		      
			//  HTML::render('<h1>Some HTML</h1>'),

		];
	}

}
