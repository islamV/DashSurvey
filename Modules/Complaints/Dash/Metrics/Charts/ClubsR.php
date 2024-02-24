<?php

namespace Modules\Complaints\Dash\Metrics\Charts;

use Dash\Extras\Metrics\Chart;
use Modules\Surveys\App\Models\Answer;
use Modules\Complaints\App\Models\Survey;


class ClubsR extends Chart
{

    /**
     * @method options
     * setup your settings in Chart
     * @return array
     */
    public function options(): array
    {
        return [
            'column' => '8',
            'elem' => 'status' // do not add hash # just clearname
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
    public function calc()
    {
        return $this->data([
            'type' => 'bar',
            'data' => [
                'labels' => [__('survey.cleanliness'),__('survey.staff'),
                 __('survey.services_provided'), __('survey.massage'),__('survey.Moroccan_bath'),__('survey.recommend'),
                 __('survey.amenities'), __('survey.difficulties')],
                'datasets' => [
                    [
                        'label' => __('survey.positiveu'),
                        'data' => [
                      Answer::where('answer', 'Satisfied')->where('type_service' ,'cleanliness')
                      ->where('type','clubs')->count(),
                          Answer::where('answer', 'Satisfied')->where('type_service' ,'staff')
                          ->where('type','clubs')->count(),
                           Answer::where('answer', 'Satisfied')->where('type_service' ,'services_provided')
                           ->where('type','clubs')->count(),
                           Answer::where('answer', 'Satisfied')->where('type_service' ,'massage')
                           ->where('type','clubs')->count(),

                           Answer::where('answer', 'Satisfied')->where('type_service' ,'Moroccan_bath')
                           ->where('type','clubs')->count(),
                               Answer::where('answer', 'Satisfied')->where('type_service' ,'recommend')
                               ->where('type','clubs')->count(),
                                Answer::where('answer', 'Satisfied')->where('type_service' ,'amenities')
                                ->where('type','clubs')->count(),
                                Answer::where('answer', 'Satisfied')->where('type_service' ,'difficulties')
                                ->where('type','clubs')->count(),

                        ],
                        'backgroundColor' => [

                            'rgba(75, 192, 192, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                          
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                          



                        ],
                        ' barPercentage' => .5

                    ],
                    [

                        'label' => __('survey.negativeu'),
                        'data' => [
                       
                            Answer::where('answer', 'NotSatisfied')->where('type_service' ,'cleanliness')
                            ->where('type','clubs')->count(),
                            Answer::where('answer', 'NotSatisfied')->where('type_service' ,'staff')
                            ->where('type','clubs')->count(),
                         Answer::where('answer', 'NotSatisfied')->where('type_service' ,'services_provided')
                         ->where('type','clubs')->count(),
                         Answer::where('answer', 'NotSatisfied')->where('type_service' ,'massage')
                         ->where('type','clubs')->count(),

                         Answer::where('answer', 'NotSatisfied')->where('type_service' ,'Moroccan_bath')
                         ->where('type','clubs')->count(),
                             Answer::where('answer', 'NotSatisfied')->where('type_service' ,'recommend')
                             ->where('type','clubs')->count(),
                              Answer::where('answer', 'NotSatisfied')->where('type_service' ,'amenities')
                              ->where('type','clubs')->count(),
                              Answer::where('answer', 'NotSatisfied')->where('type_service' ,'difficulties')
                              ->where('type','clubs')->count(),
                        ],
                        'backgroundColor' => [

                            'rgba(255, 99, 132, 0.2)',

                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',

                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                         
                            'rgba(255, 99, 132, 0.2)',
                         
                        ],
                        ' barPercentage' => .5

                    ] ,
                   
                ]
            ],


        ])
            // blank or parent or remove this prarm default is parent
            ->icon('<i class="fa-regular fa-clipboard"></i>')
            ->title(__('survey.reports'));
    }
}
