<?php
namespace Modules\Complaints\Dash\Resources;
use Dash\Resource;
use App\Dash\Filters\CoffesCBranch;
use App\Dash\Filters\CoffesCStatus;
use Modules\Complaints\App\Models\Complaint;
use Modules\Services\Dash\Resources\CoffeeShops;
use Modules\guests\Dash\Resources\GuestcoffeeShops;
use Modules\Complaints\Dash\Metrics\Charts\CoffeeShopsR;
use Modules\Complaints\Dash\Metrics\Charts\CoffeeShopsComplaints;

class CoffeeShopsComplaint extends Resource {
	
	/**
	 * define Model of resource
	 * @param Model Class
	 */ 
	public static $model = Complaint::class;
	
	public static $policy = \App\Policies\CoffeeShopsPolicy::class;


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
	public static $group = 'coffee shops'; 

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
	public static $icon = '<i class="fa-regular fa-face-frown"></i>'; // put <i> tag or icon name

	/**
	 * title static property to labels in Rows,Show,Forms
	 * @param static property string
	 */
	public static $title = 'status';

	/**
	 * defining column name to enable or disable search in main resource page
	 * @param static property array
	 */
	public static $search = [
		'id',
		'status',
		'created_at'
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
		return __('survey.complaints');
	}

	/**
	 * you can define vertext in header of page like (Card,HTML,view blade)
	 * @return array
	 */
	public static function vertex() {
		return [
			(new CoffeeShopsR)->render(),
				(new CoffeeShopsComplaints)->render(),
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
	public function query($model) {
		return $model->where('type', 'coffee_shops');
	   }
	public function fields() {
	
		return [
			belongsTo()->make(__('survey.guest_information' ), 'guest', GuestcoffeeShops::class)->column(3)->viewColumns(['phone'=>__('survey.phone')]),
			belongsTo()->make(__('survey.branch' ), 'service', CoffeeShops::class)->column(3)->f(), // name service
			
			select()->make(__('survey.Cstatus'),'status') // you can use disabled() with this element
			->options([
				'positive'=> __('survey.positive'),
				'negative'=>__('survey.negative'),
				'pending'=>__('survey.pending'),
			])->filter()->hideInCreate()->hideInUpdate(),
			 

			
			select()->make(__('survey.Cstatus'),'status') //color
			->options([
				'positive'=> __('survey.positiveu'),
				'negative'=>__('survey.negativeu'),
				'pending'=>__('survey.pendingu'),
			])->filter()->hideInIndex()->column(3),
			// text()->make(__('survey.Ctime') , 'created_at')->column(3)->hideInUpdate() ,
			fullDateTime()->make(__('survey.Ctime'), 'created_at')->f()->column(3)->hideInUpdate()->modeDates("range"),

			
			custom()->make('Canswers') 
				->view('complaints::answers')->hideInIndex()->hideInCreate()->hideInUpdate()->column(6),
				text()->make(__('Complaint Type') , 'type')->whenStore(function(){
					return ['type' =>'coffee_shops' ] ;
				})->whenUpdate(function(){
					return ['type' =>'coffee_shops' ] ;
				})->value('coffee_shops')->disabled()->hideInIndex()->hideInShow(),
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

	// /**
	//  * define the filters To Using in Resource (index)
	//  * php artisan dash:make-filter FilterName
	//  * @return array
	//  */
	// public function filters() {
	// 	return [
	// 		CoffesCStatus::class,
	// 		CoffesCBranch::class,

	// 	];
	// }

}
