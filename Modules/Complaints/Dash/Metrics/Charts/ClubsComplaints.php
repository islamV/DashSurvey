<?php
namespace Modules\Complaints\Dash\Metrics\Charts;
use Dash\Extras\Metrics\Chart;
use Modules\Complaints\App\Models\Complaint;


class ClubsComplaints extends Chart{

     /**
     * @method options
     * setup your settings in Chart
     * @return array
     */
    public function options():array{
        return [
            'column'=>'4',
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
                    'type'=>'pie',
                    'data'=>[
                            'labels'=> [__('survey.positiveu') ,__('survey.negativeu') ,__("survey.pendingu")],
                            'datasets'=>[
                                [
                                    'label'=>''.__('survey.survey'),
                                    'data'=>[
                                        Complaint::where('status' , 'positive')->where('type' , 'clubs')->count(),
                                        Complaint::where('status' , 'negative')->where('type' , 'clubs')->count(),
                                        Complaint::where('status' , 'pending')->where('type' , 'clubs')->count(),

                                    //   Complaint::where('status' , 'pending')->where('type' , 'hotels')->count(),
                                     ],
                                     'backgroundColor'=> [
                                         'rgba(78, 206, 78, 0.995)',
                                         'rgb(255, 99, 132)',
                                        'rgb(255, 205, 86)'
                                      ],
                                      'weight' => 1
                                ]
                            ]
                        ],
                      
        ]);

    }

}
