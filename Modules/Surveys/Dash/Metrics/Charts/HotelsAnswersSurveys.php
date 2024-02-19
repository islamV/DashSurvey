<?php

namespace Modules\surveys\Dash\Metrics\Charts;

use Dash\Extras\Metrics\Chart;
use Modules\Surveys\App\Models\Answer;
use Modules\Surveys\App\Models\Survey;


class HotelsAnswersSurveys extends Chart
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
            'elem' => 'HotelsAnswersSurveys' // do not add hash # just clearname
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


     public function typeServiceTrans(){
        $answers = Answer::select('type_service')->distinct()->pluck('type_service');

    
        foreach ($answers as $kay => $label) {
            $labels[$kay]= __('survey.'. $label);
    
        }  
    return  $labels ;
    }  
public function dataServiceSatisfied(){
  

$data  =  [] ; 
       foreach($this->typeService() as $kay => $value){
        $data[$kay] =    Answer::where('answer', 'Satisfied')->where('type_service' ,$value)->count();
       }
       return $data ;
}
public function dataServiceNotSatisfied(){
  

    $data  =  [] ; 
           foreach($this->typeService() as $kay => $value){
            $data[$kay] =    Answer::where('answer', 'NotSatisfied')->where('type_service' ,$value)->count();
           }
           return $data ;
    }
    public function typeService(){
        $answers = Answer::select('type_service')->distinct()->pluck('type_service');
    
        foreach ($answers as $kay => $label) {
            $labels[$kay]=  $label;
        }  
    return  $labels ;
    }  
    public function colorGreen(): array{
        $data = [] ;
        foreach($this->typeService() as $kay => $value){
            $data[$kay] =  'rgba(75, 192, 192, 0.2)';                

        }  
        return $data;

    }  
    public function colorRed(): array{
        $data = [] ;
        foreach($this->typeService() as $kay => $value){
            $data[$kay] =  'rgba(255, 99, 132, 0.2)';
           

        }  
        return $data;

    }  


    public function calc()
    {
        return $this->data([
            'type' => 'bar',
            'data' => [
                'labels' => $this->typeServiceTrans(),
                'datasets' => [
                    [
                        'label' => 'Satisfied',
                        'data' =>$this->dataServiceSatisfied(),
                        'backgroundColor' =>$this->colorGreen(),
                        ' barPercentage' => .5

                    ],
                    [

                        'label' => 'NOTSatisfied',
                        'data' => $this->dataServiceNotSatisfied(),
                        'backgroundColor' => $this->colorRed(),
                        ' barPercentage' => .5

                    ] ,
                   
                ]
            ],


        ])
            // blank or parent or remove this prarm default is parent
            ->icon('<i class="fa-regular fa-clipboard"></i>')
            ->title(__('answer'));
    }
}
