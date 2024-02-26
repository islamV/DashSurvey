<?php
namespace Modules\Complaints\Dash\Metrics\Charts;
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
            'column'=>'9',
            'elem'=>'surveys'// do not add hash # just clearname
        ];
    }

     public function typeServiceTrans(){
        $labels = [__('dash.hotels') , __('dash.hospitals') , __("dash.clubs") , __('dash.coffee shops')];
        return  $labels ;

    }  
public function dataServicePositive(){
  

$data  =  [] ; 
       foreach($this->typeService() as $kay => $value){
        $data[$kay] =    Survey::where('service_type', $value)->where('status' ,'positive')->count();
       }
       return $data ;
}
public function dataServiceNotSatisfied(){
  

    $data  =  [] ; 
           foreach($this->typeService() as $kay => $value){
            $data[$kay] =     Survey::where('service_type', $value)->where('status' ,'negative')->count();
           }
           return $data ;
    }
    public function typeService(){
        $labels = ['hotels', 'hospitals' , "clubs" , 'coffee_shops'];
      
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
            'type' => 'bar',
            'data' => [
                'labels' => $this->typeServiceTrans(),
                'datasets' => [
                    [
                        'label' => __('survey.positiveu') ,
                        'data' =>$this->dataServicePositive(),
                        'backgroundColor' =>$this->colorGreen(),
                        ' barPercentage' => .5

                    ],
                    [

                        'label' => __('survey.negativeu'),
                        'data' => $this->dataServiceNotSatisfied(),
                        'backgroundColor' => $this->colorRed(),
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
