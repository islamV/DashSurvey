<?php
namespace Modules\questions\Dash\Resources;
use Dash\Resource;

use Modules\Questions\App\Models\Question;

class HotelsQ extends Resource {
	
	public static $model = Question::class;

	/**
	 * Policy Permission can handel
	 * (viewAny,view,create,update,delete,forceDelete,restore) methods
	 * @param static property as Policy Class
	 */
	//public static $policy =UserPolicy::class;

	/**
	 * define this resource in group to show in navigation menu
	 * if you need to translate a dynamic name
	 * define dash.php in /resources/views/lang/en/dash.php
	 * and add this key directly users
	 * @param static property
	 */
	public static $group = 'questions'; 

	/**
	 * show or hide resouce In Navigation Menu true|false
	 * @param static property string
	 */
	public static $displayInMenu = true;

	/**
	 * change icon in navigation menu
	 * you can use font awesome icons LIKE (<i class="fa fa-users"></i>)
	 * @param static property string
	 */
	public static $icon = '<i class="fa-solid fa-clipboard-question"></i>'; // put <i> tag or icon name

	/**
	 * title static property to labels in Rows,Show,Forms
	 * @param static property string
	 */
	public static $title = 'title';

	/**
	 * defining column name to enable or disable search in main resource page
	 * @param static property array
	 */
	public static $search = [
		'id',
		'title',
	];

	/**
	 *  if you want define relationship searches
	 *  one or Multiple Relations
	 * 	Example: method=> 'invoices'  => columns=>['title'],
	 * @param static array
	 */
	public static $searchWithRelation = [];

	/**
	 * if you need to custom resource name in menu navigation
	 * @return string
	 */
	public function query($model) {
		return $model->where('type', 'hotels');
	   }
	public static function customName() {
		return  __('dash.hotels');
	}

	/**
	 * you can define vertext in header of page like (Card,HTML,view blade)
	 * @return array
	 */
	public static function vertex() {
		return [];
	}

	/**
	 * define fields by Helpers
	 * @return array
	 */
	public function fields() {
		return [
			text()->make(__ ('title') , 'title')->rule('required'),
			select()->make(__('survey.type_service'),'type_service') // you can use disabled() with this element
			->options([
			'Reception_Bellman'=> __('survey.Reception_Bellman'),
			'Reservation_checkin_checkout_riendly'=>__('survey.Reservation_checkin_checkout_riendly'),
			'Resturant'=>__('survey.Resturant'),
			'Food'=>__('survey.Food'),
			'coffe_shop'=>__('survey.coffe_shop'),
			'Swimmingpool_GYM'=>__('survey.Swimmingpool_GYM'),
			'cleanliness_room'=>__('survey.cleanliness_room'),
			'cleanliness_Area'=>__('survey.cleanliness_Area'),
			'Money'=>__('survey.Money'),
			'WI-FI'=>__('survey.WI-FI'),
			

			])->column(6),

			text()->make(__('service Type') , 'type')->whenStore(function(){
				return ['type' =>'hotels' ] ;
			})->whenUpdate(function(){
				return ['type' =>'hotels' ] ;
			})->value('Hotels')->disabled()->hideInIndex(),
		];
	}

	/**
	 * define the actions To Using in Resource (index,show)
	 * php artisan dash:make-action ActionName
	 * @return array
	 */
	public function actions() {
		return [];
	}

	/**
	 * define the filters To Using in Resource (index)
	 * php artisan dash:make-filter FilterName
	 * @return array
	 */
	public function filters() {
		return [];
	}

}
