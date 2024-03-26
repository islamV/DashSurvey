<?php
namespace App\Dash\Dashboard;

use Dash\Resource;
//use Dash\Extras\Inputs\HTML;
use Dash\Extras\Inputs\Card;

use App\Dash\Metrics\Values\AllUsers;
use App\Dash\Metrics\Values\AllAdmins;
use App\Dash\Metrics\Values\AllAdminGroups;
use Modules\surveys\Dash\Metrics\Values\Hotels;
use Modules\Surveys\Dash\Metrics\Charts\Surveys;
use Modules\surveys\Dash\Metrics\Values\AllSurveys;

class SurveysReports extends Resource {

	/**
	 * add your card here by Card , HTML Class
	 * or by view instnance render blade file
	 * @return array<string>
	 */
	public static function cards() {
		return [

                (new Surveys)->render(), //chart
				
		];
	}

}
