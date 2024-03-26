<?php
namespace App\Dash\Dashboard;

use Dash\Resource;
//use Dash\Extras\Inputs\HTML;
use Dash\Extras\Inputs\Card;

use App\Dash\Metrics\Values\AllUsers;
use App\Dash\Metrics\Values\AllAdmins;
use App\Dash\Metrics\Values\AllAdminGroups;
use Modules\surveys\Dash\Metrics\Values\Hotels;
use Modules\Complaints\Dash\Metrics\Charts\Complaints;
use Modules\surveys\Dash\Metrics\Values\AllSurveys;

class ComplaintReports extends Resource {

	/**
	 * add your card here by Card , HTML Class
	 * or by view instnance render blade file
	 * @return array<string>
	 */
	public static function cards() {
		return [

                (new Complaints)->render(), //chart
				
		];
	}

}
