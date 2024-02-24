<?php
namespace App\Dash\Metrics\Charts;
use Dash\Extras\Metrics\Chart;
use Modules\Surveys\App\Models\Survey;
use Modules\Surveys\Dash\Resources\HotelsSurvey;

class Surveys extends Chart{

     /**
     * @method options
     * setup your settings in Chart
     * @return array
     */
    public function options():array{
        return [
            'column'=>'3',
            'elem'=>'status'// do not add hash # just clearname
        ];
    }

    /**
     * calculate method is short to calc to set dataset in chart
     * You Can Set Type Using | doughnut , line , bar ,polarArea , radar, scatter, bubble , mixed
     * this chart based on ChartJs visit https://www.chartjs.org/docs/latest
     * to get your main setting  to set your chart
     * for more information about this visit https://phpdash.com/docs/1.x/Metrics#chart
     * @return $this->data method
     *
     */
    public function calc(){
        return $this->data([
                    'type'=>'bar',
                    'data'=>[
                            'labels'=> ['positive'],
                            'datasets'=>[
                                [
                                    'label'=>'  حالات الاستبيان الايجابية' ,
                                    'data'=>[
                                      Survey::where('status','positive')->where('service_type' ,'hotels')->count() ,
                                     ],
                                     'backgroundColor'=> [

                                        'rgba(75, 192, 192, 0.2)',
                                       
                                     
                                        
                                      
                                      ],
                                   ' barPercentage'=> .5
                                  
                                  
                                ]
                                ,
                                [
                                    
                                    'label'=>'  حالات الاستبيان السلبية' ,
                                    'data'=>[
                                   10
                                     ],
                                     'backgroundColor'=> [

                                     
                                        'rgba(255, 99, 132, 0.2)',
                                     
                                        
                                      
                                      ],
                                   ' barPercentage'=> .5
                                  
                                ]
                            ]
                        ],
                      
                    
        ])  ->column(7)
    // blank or parent or remove this prarm default is parent
        ->icon('<i class="fa-regular fa-clipboard"></i>')
        ->title(__('survey.report'));
     

    }

}

