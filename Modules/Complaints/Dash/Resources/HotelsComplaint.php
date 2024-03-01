<?php
namespace Modules\Complaints\Dash\Resources;
use Dash\Resource;

use App\Dash\Filters\HotelsCBranch;
use App\Dash\Filters\HotelsCStatus;
use Modules\Services\Dash\Resources\Hotels;
use Modules\Complaints\App\Models\Complaint;
use Modules\guests\Dash\Resources\Guesthotels;
use Modules\Complaints\Dash\Metrics\Charts\HotelsR;
use Modules\Complaints\Dash\Metrics\Charts\HotelComplaints;

class HotelsComplaint extends Resource {
	
	public static $model = Complaint::class;

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
	public static $group =  'hotels'; 
	public static $policy = \App\Policies\HotelsPolicy::class;

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
	public static $title = 'id';

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
	public function query($model) {
		return $model->where('type', 'hotels');
	   }
	public static function customName() {
		return  __('survey.complaints');
	}

	/**
	 * you can define vertext in header of page like (Card,HTML,view blade)
	 * @return array
	 */
	public static function vertex() {
		return [
			(new HotelsR)->render('hotels2'),
			(new HotelComplaints)->render('hotels1'),
		];
	}
	public static function dtButtons() {
		return [
		
		
			// 'print',
			'pdf',
			'excel',
			'csv',
			'copy',
		]; 
	}
	/**
	 * define fields by Helpers
	 * @return array
	 */
	public function fields() {
		return [
			belongsTo()->make(__('survey.guest_information' ), 'guest', Guesthotels::class)->column(3)->viewColumns(['phone'=>__('survey.phone')]),
			belongsTo()->make(__('survey.branch' ), 'service', Hotels::class)->column(3), // name service

			select()->make(__('survey.Cstatus'),'status') 
			->options([
			'positive'=> __('survey.positive'),
			'negative'=>__('survey.negative'),
			'pending'=>__('survey.pending'),
			])->selected('pending')->hideInUpdate()->hideInCreate()->column(6)->valueWhenUpdate('pending')->column(3),

			select()->make(__('survey.Cstatus'),'status') // you can use disabled() with this element
			->options([
				'positive'=> __('survey.positiveu'),
				'negative'=>__('survey.negativeu'),
				'pending'=>__('survey.pendingu'),
			])->selected('pending')->hideInIndex()->hideInShow()->column(6)->valueWhenUpdate('pending')->column(3),
			text()->make(__('survey.Ctime') , 'created_at')->column(3)->hideInUpdate() ,
			
			
			custom()->make('Canswers') 
				->view('complaints::answers')->hideInIndex()->hideInCreate()->hideInUpdate()->column(6),
				text()->make(__('Complaint Type') , 'type')->whenStore(function(){
					return ['type' =>'hotels' ] ;
				})->whenUpdate(function(){
					return ['type' =>'hotels' ] ;
				})->value('Hotels')->disabled()->hideInIndex()->hideInShow(),
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
		return [
			HotelsCStatus::class,
			HotelsCBranch::class,

		];
	}

}
