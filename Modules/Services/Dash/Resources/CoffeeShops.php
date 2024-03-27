<?php
namespace Modules\Services\Dash\Resources;
use Dash\Resource;
use Modules\Services\App\Models\Service;
use Modules\CoffeeShops\App\Models\CoffeeShop;




class CoffeeShops extends Resource {
	
	/**
	 * define Model of resource
	 * @param Model Class
	 */ 
	public static $model = Service::class;
	public static $policy = \App\Policies\ServicePolicy::class;

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
	public static $group = 'services'; 

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
	public static $icon = '<i class="fa-solid fa-mug-saucer"></i>'; // put <i> tag or icon name

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
			text()->make(__('dash::dash.name'),'name')->rule('required'),
			text()->make(__('dash::dash.address'),'address')->rule('required'),
		
			text()->make(__('service Type') , 'type')->whenStore(function(){
				return ['type' =>'coffee_shops' ];

			})->whenUpdate(function(){
				return ['type' =>'coffee_shops' ] ;

			})->disabled()->value('Coffee Shops')->hideInIndex()
			
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
	 * define the filters To Using in Resource (index)
	 * php artisan dash:make-filter FilterName
	 * @return array
	 */
	public function filters() {
		return [];
	}

}
