<?php
namespace Modules\surveys\Dash\Metrics\Charts;
use Dash\Extras\Metrics\Chart;

class CoffeeShopsSurveys extends Chart{

     /**
     * @method options
     * setup your settings in Chart
     * @return array
     */
    public function options():array{
        return [
            'column'=>'6',
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
                            'labels'=> [/*write some labels */],
                            'datasets'=>[
                                [
                                    'label'=>'total groups',
                                    'data'=>[
                                       /* write some values using ORM OR QueryBuilder */
                                     ],
                                ]
                            ]
                        ],
                        /*
                         you can add more options here after data
                        */
        ]);

    }

}
