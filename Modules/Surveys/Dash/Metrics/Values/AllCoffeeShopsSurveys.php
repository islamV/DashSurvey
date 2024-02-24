<?php
namespace Modules\surveys\Dash\Metrics\Values;
use Dash\Extras\Metrics\Value;
use Modules\Surveys\App\Models\Survey;

class AllCoffeeShopsSurveys extends Value{

    /**
     * calculate method is short to calc to using in value
     * for more information about this visit https://phpdash.com/docs/1.x/Metrics#Value
     * @return $this->sum or count method
     *
     */
      public function calc(){
        return
        $this->count(Survey::class , function($q){
            return $q->where('service_type' ,'coffee_shops');
        }) // or sum // $this->sum(YourModel::class,'id') | id column is optional
        ->at('created_at') // optional
        ->column(3) // optional
        ->href(dash('resource/HotelsSurvey'))
        ->icon('<i class="fa-solid fa-mug-saucer"></i>') // icon by fontawesome or other | optional
         ->title(__('survey.coffee_shopsReports')) // optional
        // ->subTitle('Your subTitle') // optional
        //  ->textBody('Text In Body') // optional
         ->prefix('<i class="fa-solid fa-mug-saucer"></i>') // add prefix before number or icon
        // ->suffix('Your suffix') // optional add suffix after number
       ;
    }

     /**
     * ranges
     * enable dropdown select to set range to count or sum data you can add more by days like 730
     * @return array<string>
     */
    public function ranges(){
        return [
            'all'=>'All',
            'today'=>'Today',
            'yesterday'=>'Yesterday',
            '3'=>'last 3 days',
            '4'=>'last 4 days',
            'week'=>'Week',
            'month'=>'month',
            'year'=>'year',
            '730'=>'2 years',
        ];
    }

}
