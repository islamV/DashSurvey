<?php
namespace App\Dash\Pages;
//use App\Models\ModelName;
use Dash\Pages;
use Dash\Resource;
use App\Dash\Metrics\Values\AllAdmins;
use Illuminate\Contracts\Support\Renderable;
use App\Dash\Dashboard\ComplaintReports;

class ComplaintReport extends Pages {

    /**
    * @var string $model
    */
	//public static $model    = ModelName::class ;

    /**
    * @var string $icon
    */
	public static $icon     = '<i class="fa-solid fa-chart-column"></i>';
	public static $group = 'hotels'; 

    /**
    * @var string $position
    */
	public static $position = 'top';// top|bottom


	/**
	 * Rule List array
	 * @return array<string>
	 */
	public static function rule() {
		return [
			//'name' => 'required|string',
		];
	}

	/**
	 * Nicename Fields
	 * @return array<string>
	 */
	public static function attribute() {
		return [
			//'name' => 'Name',
		];
	}

	/**
	 * custom page name
	 * @return string
	 */
	public static function pageName() {
		return __("survey.reports");
	}

	/**
	 * custom content page
	 * @return Renderable
	 */
	 


	
	public static function content() {
		$content = '';
	
			foreach (ComplaintReports::cards() as $card) {
				$content .= $card;
			}
		
		// if new dashboard setup fire the ui Session settings
		if (!session()->has('ui')) {
			session()->put('ui', [
				'navbarFixed' => 'no',
				'darkVersion' => 'no',
				'bg'          => 'bg-gradient-dark',
				'color'       => 'info',
			]);
		}
		return view('SurveyReports', [
				'title'    => static ::pageName(),
				//'SurveyReports' => ModelName::find(1),
				'content' => $content
			]);
	}

	
	
	
}
