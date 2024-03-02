<?php
namespace App\Dash\Dashboard;
use Dash\Resource;
use Dash\Extras\Inputs\Card;
use Dash\Extras\Inputs\HTML;

use App\Dash\Metrics\Charts\Users;

//use Dash\Extras\Inputs\HTML;
use App\Dash\Metrics\Values\AllUsers;
use App\Dash\Metrics\Values\AllAdmins;
use App\Dash\Metrics\Values\AllAdminGroups;


use App\Dash\Metrics\Values\AllAdminGroupRoles;

use Modules\Surveys\Dash\Metrics\Charts\Surveys;
use Modules\Surveys\Dash\Metrics\Values\AllSurveys;
use Modules\complaints\Dash\Metrics\Charts\Compliants;
use Modules\Surveys\Dash\Metrics\Values\AllClubsSurveys;
use Modules\complaints\Dash\Metrics\Values\AllComplaints;
use Modules\Surveys\Dash\Metrics\Values\AllHotelsSurveys;
use Modules\Surveys\Dash\Metrics\Values\AllHospitalsSurveys;
use Modules\complaints\Dash\Metrics\Values\AllClubsComplaints;
use Modules\Surveys\Dash\Metrics\Values\AllCoffeeShopsSurveys;
use Modules\complaints\Dash\Metrics\Values\AllHotelsComplaints;
use Modules\complaints\Dash\Metrics\Values\AllHospitalsComplaints;
use Modules\complaints\Dash\Metrics\Values\AllCoffeeShopsComplaints;

class Help extends Resource {

	/**
	 * add your card here by Card , HTML Class
	 * or by view instnance render blade file
	 * @return array
	 */
	public static function cards() {
		return [
        //  (new AllAdmins)->render(),
            // (new AllUsers)->render(),
            // (new AllAdminGroups)->render(),
            // (new AllAdminGroupRoles)->render(),
		// 	(new Users)->render("users"),
		//  (new Surveys)->render("usrvey"),
		    //   (new Surveys)->render("surveys"),
		    //   (new Compliants)->render("Compliants"),
			(new AllSurveys)->render(),
			(new AllHotelsSurveys)->render(),
			(new AllHospitalsSurveys)->render(),
			(new AllClubsSurveys)->render(),
			(new AllCoffeeShopsSurveys)->render(),
			(new AllComplaints)->render(),
			
			(new AllHotelsComplaints)->render(),
			(new AllHospitalsComplaints)->render(),
			(new AllClubsComplaints)->render(),
			(new AllCoffeeShopsComplaints)->render(),

		];
	}

}


