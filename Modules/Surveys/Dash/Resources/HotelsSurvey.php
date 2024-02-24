<?php
namespace Modules\Surveys\Dash\Resources;

use App\Policies\HotelsServeyPolicy;
use Dash\Resource;
use App\Dash\Metrics\Charts\Surveys;
use Modules\Surveys\App\Models\Survey;

use App\Dash\Filters\HotelsSurveyBranch;
use App\Dash\Filters\HotelsSurveyStatus;
use App\Policies\Surveys as PoliciesSurveys;
use Modules\Services\App\Models\Service;
use Modules\Questions\App\Models\Question;
use Modules\Services\Dash\Resources\Hotels;
use Modules\questions\Dash\Resources\HotelsQ;
use Modules\guests\Dash\Resources\Guesthotels;
use Modules\Surveys\Dash\Metrics\Charts\HotelsSurveys;
use Modules\Surveys\Dash\Metrics\Charts\HotelsAnswersSurveys;

class HotelsSurvey extends Resource {


	/**
	 * define Model of resource
	 * @var string $model
	 */
	public static $model = Survey::class;

	/**
	 * Policy Permission can handel
	 * (viewAny,view,create,update,delete,forceDelete,restore) methods
	 * @var string $policy
	 */
	public static $policy = \App\Policies\HotelsPolicy::class;


	/**
	 * define this resource in group to show in navigation menu
	 * if you need to translate a dynamic name
	 * define dash.php in /resources/views/lang/en/dash.php
	 * and add this key directly users
	 * @var string $group
	 */
	public static $group = 'hotels';

	/**
	 * show or hide resouce In Navigation Menu true|false
	 * @var bool $displayInMenu
	 */

	
	 	public static $displayInMenu =  true ;

	/**
	 * change icon in navigation menu
	 * you can use font awesome icons LIKE (<i class="fa fa-users"></i>)
	 * @var string $icon
	 */
	public static $icon = '<i class="fa-regular fa-clipboard"></i>'; // put <i> tag or icon name

	/**
	 * title static property to labels in Rows,Show,Forms
	 * @var string $title
	 */
	public static $title = 'status';

	/**
	 * defining column name to enable or disable search in main resource page
	 * @var array<string> $search
	 */
	public static $search = [
		'id',
		'status',
	];

	/**
	 *  if you want define relationship searches
	 *  one or Multiple Relations
	 * 	Example: method=> 'invoices'  => columns=>['title'],
	 * @var array<string> $searchWithRelation
	 */
	public static $searchWithRelation = [
        'guest' => ['name' , 'phone'] ,

	];

	/**
	 * if you need to custom resource name in menu navigation
	 * @return string
	 */
	public static function customName() {
		return __('survey.hotelsReports');
	}


	public function query($model){
		return $model->where('service_type' , 'hotels') ;
	}

	/**
	 * you can define vertext in header of page like (Card,HTML,view blade)
	 * @return array<string>
	 */

	public static function vertex() {
		return 
			[(new HotelsAnswersSurveys)->render('hotel'),
		 (new HotelsSurveys)->render('hotel2'),
		//  (new \Modules\surveys\Dash\Metrics\Values\Hotels)->render(),
		
		
		];
		
	}

		
	public static function dtButtons() {
		return [
		
		
			'print',
			'pdf',
			'excel',
			'csv',
			'copy',
		]; 
	}

	/**
	 * define fields by Helpers
	 * @return array<string>
	 */

	public function fields() {
		return [

			belongsTo()->make(__('survey.guest_information' ), 'guest', Guesthotels::class)->column(3)->viewColumns(['phone'=>__('survey.phone')])->whenUpdate(function($model){
				return['guest_id' =>$model->guest_id];
			}),
            
			// belongsTo()->make(__('survey.guest_information' ), 'guest', Guests::class)->column(3)->ViewColumns('phone'),
			belongsTo()->make(__('survey.branch' ), 'service', Hotels::class)->column(3), // name service


			// morphTo()->make(__('survey.branch' ), 'service', Hotels::class)->column(3),
			select()->make(__('survey.status'),'status') 
			->options([
			'positive'=> __('survey.positive'),
			'negative'=>__('survey.negative'),
			'pending'=>__('survey.pending'),
			])->selected('pending')->hideInUpdate()->hideInCreate()->column(6)->valueWhenUpdate('pending')->column(3),

			select()->make(__('survey.status'),'status') // you can use disabled() with this element
			->options([
				'positive'=> __('survey.positiveu'),
				'negative'=>__('survey.negativeu'),
				'pending'=>__('survey.pendingu'),
			])->selected('pending')->hideInIndex()->hideInShow()->column(6)->valueWhenUpdate('pending')->column(3),
			text()->make(__('survey.time') , 'created_at')->column(3)->hideInUpdate() ,
			// hasMany()->make(__('answer') , 'answers' , Answers::class ),
			// you can use help & placeholder , whenstore , whenUpdate
				textarea()->make(__('survey.note') , 'note'),
				custom()->make('answers') 
				->view('surveys::answers')->hideInIndex()->hideInCreate()->hideInUpdate()->column(6), // append your blade file
			

		];
	}

	/**
	 * define the actions To Using in Resource (index,show)
	 * php artisan dash:make-action ActionName
	 * @return array<string>
	 */
	public function actions() {
		return [];
	}

	/**
	 * define the filters To Using in Resource (index)
	 * php artisan dash:make-filter FilterName
	 * @return array<string>
	 */
	public function filters() {
		return [
			HotelsSurveyStatus::class,
			HotelsSurveyBranch::class,

		];
	}

}
