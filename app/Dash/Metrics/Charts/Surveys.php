<?php
namespace App\Dash\Metrics\Charts;
use Dash\Extras\Metrics\Chart;

class Surveys extends Chart{

     /**
     * @method options
     * setup your settings in Chart
     * @return array
     */
    public function options():array{
        return [
            'column'=>'3',
            'elem'=>'YourElementAttributeIDWithoutHash'// do not add hash # just clearname
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
                            'labels'=> ['positive' , 'negative'],
                            'datasets'=>[
                                [
                                    'label'=>'حالات الاستبيان',
                                    'data'=>[
                                       15751 ,20000
                                     ],
                                     'backgroundColor'=> [

                                        'rgba(75, 192, 192, 0.2)',
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

