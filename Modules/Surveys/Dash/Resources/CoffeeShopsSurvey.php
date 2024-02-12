<?php
namespace Modules\Surveys\Dash\Resources;
use Dash\Resource;
use Modules\Surveys\App\Models\Survey;

use Modules\guests\Dash\Resources\Guests;
use Modules\CoffeeShops\Dash\Resources\CoffeeShops;



class CoffeeShopsSurvey extends Resource {


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
	//public static $policy = UserPolicy::class;

	/**
	 * define this resource in group to show in navigation menu
	 * if you need to translate a dynamic name
	 * define dash.php in /resources/views/lang/en/dash.php
	 * and add this key directly users
	 * @var string $group
	 */
	public static $group = 'surveys';

	/**
	 * show or hide resouce In Navigation Menu true|false
	 * @var bool $displayInMenu
	 */
	public static $displayInMenu = true;

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
	public static $title = 'name';

	/**
	 * defining column name to enable or disable search in main resource page
	 * @var array<string> $search
	 */
	public static $search = [
		'id',
		'name',
	];

	/**
	 *  if you want define relationship searches
	 *  one or Multiple Relations
	 * 	Example: method=> 'invoices'  => columns=>['title'],
	 * @var array<string> $searchWithRelation
	 */
	public static $searchWithRelation = [];

	/**
	 * if you need to custom resource name in menu navigation
	 * @return string
	 */
	public static function customName() {
		return __('dash.coffee shops');
	}

	/**
	 * you can define vertext in header of page like (Card,HTML,view blade)
	 * @return array<string>
	 */
	public static function vertex() {
		return [];
	}
public function query($model){
	return $model->where('service_type' , 'coffee_shops') ;
}
	/**
	 * define fields by Helpers
	 * @return array<string>
	 */
	public function fields() {
		return [
			belongsTo()->make(__('survey.guest_information' ), 'guest', Guests::class)->column(3),
			// belongsTo()->make(__('survey.branch' ), 'coffeeshop', CoffeeShops::class)->column(3),
			select()->make(__('survey.status'),'status') // you can use disabled() with this element
			->options([
			'positive'=> __('survey.positive'),
			'negative'=>__('survey.negative'),
			'pending'=>__('survey.pending'),
			])->selected('pending')->hideInUpdate()->hideInCreate()->column(6)->valueWhenUpdate('pending'),

			select()->make(__('survey.status'),'status') // you can use disabled() with this element
			->options([
				'positive'=> __('survey.positiveu'),
				'negative'=>__('survey.negativeu'),
				'pending'=>__('survey.pendingu'),
			])->selected('pending')->hideInIndex()->hideInShow()->column(6)->valueWhenUpdate('pending'),
			text()->make(__('survey.time') , 'created_at')->column(6)->hideInUpdate() ,
			
			textarea()->make(__('survey.note') , 'note') ,
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
		return [];
	}

}
