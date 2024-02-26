<?php
namespace Modules\questions\Dash\Resources;
use Dash\Resource;
use Modules\Questions\App\Models\Question;


class CoffeeShopsQ extends Resource {
	
	/**
	 * define Model of resource
	 * @param Model Class
	 */ 
	public static $model = Question::class;
	public static $policy = \App\Policies\QuestionsPolicy::class;

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
	public static $title = 'name';

	/**
	 * defining column name to enable or disable search in main resource page
	 * @param static property array
	 */
	public static $search = [
		'id',
		'name',
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
	public static function customName() {
		return __('survey.coffee shops');
	}

	/**
	 * you can define vertext in header of page like (Card,HTML,view blade)
	 * @return array
	 */
	public static function vertex() {
		return [];
	}

	public function query($model) {
		return $model->where('type', 'coffee_shops');
	   }
	public function fields() {
		return [
			text()->make(__ ('title') , 'title')->rule('required'),
			select()->make(__('survey.type_service'),'type_service') // you can use disabled() with this element
			->options([
			'quality_coffee'=> __('survey.quality_coffee'),
			'bakery'=>__('survey.bakery'),
			'candy'=>__('survey.candy'),
			'speed'=> __('survey.speed'),
			'quality'=>__('survey.quality'),
			'employees'=>__('survey.employees'),
			])->column(6),
			
			text()->make(__('service Type') , 'type')->whenStore(function(){
				return ['type' =>'coffee_shops' ] ;
			})->whenUpdate(function(){
				return ['type' =>'coffee_shops' ] ;
			})->value('coffee_shops')->disabled()->hideInIndex(),
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
