<?php
namespace Modules\surveys\Dash\Metrics\Charts;
use Dash\Extras\Metrics\Chart;
use Modules\Surveys\App\Models\Survey;

class Surveys extends Chart{

     /**
     * @method options
     * setup your settings in Chart
     * @return array
     */
    public function options():array{
        return [
            'column'=>'6',
            'elem'=>'surveys'// do not add hash # just clearname
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
                        'labels' => [__('survey.positiveu') , __('survey.pendingu') ,__('survey.negativeu')],
                        'datasets'=> [[
                            'label'=> __('surveys.reports'),
                            'data'=> [   Survey::where('status' , 'positive')->count(),
                            Survey::where('status' , 'pending')->count(),
                            Survey::where('status' , 'negative')->count(),] ,
                            'backgroundColor'=> [
                                'rgba(75, 192, 192, 0.2)',
                                // 'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                  'rgba(255, 99, 132, 0.2)', 
                              //   'rgba(153, 102, 255, 0.2)',
                              //   'rgba(201, 203, 207, 0.2)'
                              //'rgba(255, 205, 86, 0.2)',
                            ],
                            'borderColor'=> [
                                // 'rgb(54, 162, 235)',
                                'rgb(75, 192, 192)',
                                'rgb(255, 159, 64)',
                              'rgb(255, 99, 132)',
                            //   'rgb(255, 205, 86)',
                            //   'rgb(153, 102, 255)',
                            //   'rgb(201, 203, 207)'
                            ],
                            'borderWidth'=> 1
                          
                        ]],
                    ],
        ]);

    }

}
