<?php
namespace App\Dash\Filters;

use Dash\Extras\Inspector\Filter;

class CoffesCStatus extends Filter {

	/**
	 * use this optional label to set custom name or can remove
	 * it to automatic using label from resource
	 * @return string
	 */
	public static function label() {
		return __('survey.status'); // you can use trans
	}


	/**
	 * options method to set a options
	 * for filtration data in index page in resource
	 * you can use Model with Pluck Example: User::pluck('name','id')
	 * @return array<string>
	 */
	public static function options() {
		return [
		
			'status'   => [
				'positive'    => __("survey.positiveu"), // you can use trans
				'negative'    => __('survey.negativeu'),
				'pending' =>  __("survey.pendingu"),
			],
		];
	}

}
