<?php
namespace App\Dash\Metrics\Charts;

use App\Models\User;
use Dash\Extras\Metrics\Chart;

class Users extends Chart{

     /**
     * @method options
     * setup your settings in Chart
     * @return array
     */
    public function options():array{
        return [
            'column'=>'6',
            'elem'=>'YourElementAttributeIDWithoutHash' ,// do not add hash # just clearname,
            'title'=>'your chart name',
            'icon'=>'font awesom icon here with i tag',
            'subTitle'=>'your Subtitle ',
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
    // doughnut  
    public function calc(){
        return $this->data([
                    'type'=>'bar',
                    'data'=>[
                            'labels'=> ['users' , 'admin'],
                            'datasets'=>[
                                [
                                    'label'=>'total groups',
                                    'data'=>[
                                     User::get()->count() ,
                                     User::get()->count(),
                
                                     ],
                                ]
                            ]
                        ],
                        'backgroundColor'=> [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                        
                          ],
                          'hoverOffset'=> 4
                      
        ]) ;


    }


}