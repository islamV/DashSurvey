<?php
namespace Modules\guests\Dash\Resources;
use Dash\Resource;
use Illuminate\Support\Facades\Auth;
use Modules\Guests\App\Models\Guest;
use Modules\Surveys\Dash\Resources\HotelsSurvey;

class Guesthotels extends Resource {
	
	
	public static $model = Guest::class;

	public static $group = 'hotels'; 
	public static $policy = \App\Policies\HotelsPolicy::class;


            
	public static $displayInMenu =true ;

    public static $lengthMenu        = [20, 40, 60, 80, 100];
	
	public static $icon = '<i class="fa-solid fa-hotel"></i>'; // put <i> tag or icon name



	public static $title = 'name';

	public static $search = [
		'id',
		'name',
		'phone',
	];
public static function dtButtons() {
	return [
	
	
		// 'print',
		'pdf',
		'excel',
		'csv',
		'copy',
	]; 
}

	public static $searchWithRelation = [];

	/**
	 * if you need to custom resource name in menu navigation
	 * @return string
	 */
	public static function customName() {
		return __('survey.gusetsReports');
	}

	public function query($model) {
		return $model->where('service_type', 'hotels');
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
	
			text()->make(__('dash::dash.name'),'name')->rule('required')->column(2),
			tel()->make(__('dash::dash.phone'),'phone')->placeholder('01234567899')->rule('required' , 'regex:/^(0|(\+\d{1,2}\s?))?(\(\d{3}\)|\d{3})([-.\s]?)\d{3}([-.\s]?)\d{4}$/'),
			hasMany()->make(__('survey.status' ), 'servey', HotelsSurvey::class),

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
// // datatable
// public static $multiSelectRecord = true;
// public static $searching         = true;
// public static $lengthChange      = true;
// public static $ordering          = true;
// public static $processing        = true;
// public static $serverSide        = true;
// public static $scrollCollapse    = true;
// public static $scrollY           = false;
// public static $scrollX           = true;
// public static $paging            = true;
// public static $lengthMenu        = [10, 20, 25, 50, 100];
// //full_numbers,numbers,simple,scrolling
// public static $pagingType = 'full_numbers';

// public static function dtButtons() {
// 	return [
// 		'pageLength',
// 		'collection',
// 		'selectedSingle',
// 		'selectRows',
// 		'selectColumns',
// 		'selectCells',
// 		'selectAll',
// 		'searchPanes',
// 		'searchBuilder',
// 		'colvis',
// 		'fixedColumns',
// 		'colvisRestore',
// 		'columnsToggle',
// 		'colvisGroup',
// 		'spacer',
// 		'print',
// 		'pdf',
// 		'excel',
// 		'csv',
// 		'copy',
// 	]; 
// }
