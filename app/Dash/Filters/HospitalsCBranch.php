<?php
namespace App\Dash\Filters;

use Dash\Extras\Inspector\Filter;
use Modules\Services\App\Models\Service;

class HospitalsCBranch extends Filter {

	/**
	 * use this optional label to set custom name or can remove
	 * it to automatic using label from resource
	 * @return string
	 */
	public static function label() {
		return __('survey.branch'); // you can use trans
	}


	/**
	 * options method to set a options
	 * for filtration data in index page in resource
	 * you can use Model with Pluck Example: User::pluck('name','id')
	 * @return array<string>
	 */
	public static function options() {
		return [
			'service_id'=>Service::where('type' , 'hospitals')->pluck('name','id'), // first Column
		
		];
	}

}
