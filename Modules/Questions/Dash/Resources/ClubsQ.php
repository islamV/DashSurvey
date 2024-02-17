<?php
namespace Modules\questions\Dash\Resources;
use Dash\Resource;
use Modules\Questions\App\Models\Question;

class ClubsQ extends Resource {
	
	/**
	 * define Model of resource
	 * @param Model Class
	 */ 
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

	public function query($model) {
		return $model->where('type', 'clubs');
	   }
	public static function customName() {
           return __('dash.clubs') ;
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
				'cleanliness'=> __('survey.cleanliness'),
				'staff'=>__('survey.staff'),
				'services_provided'=>__('survey.services_provided'),
				'massage'=>__('survey.massage'),
				' Moroccan_bath'=>__('survey.Moroccan_bath'),
				'recommend'=>__('survey.recommend'),
				'amenities'=>__('survey.amenities'),
				'Money'=>__('survey.Money'),
				'difficulties '=>__('survey.difficulties'),
				
			])->column(6),

			text()->make(__('service Type') , 'type')->whenStore(function(){
				return ['type' =>'clubs' ] ;
			})->whenUpdate(function(){
				return ['type' =>'clubs' ] ;
			})->value('clubs')->disabled()->hideInIndex(),
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
