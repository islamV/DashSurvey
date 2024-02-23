<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Services\App\Models\Service;
use Modules\Surveys\App\Models\Survey;

class SurveyReports extends Component
{

      public $selectedService = null;
      public $service ;
      public $section ;
    



    public function render(){
        $options = Service::where("type",$this->selectedService )->get();
        // $sections = Service::where("type",$this->selectedService )->get();
        $positive  = Survey::where('status' ,'positive')->count();
        $negative  = Survey::where('status' ,'negative')->count();
        $all  = Survey::count();
        if($this->selectedService  && !$this->service ){
            $positive  = Survey::where('service_type' ,$this->selectedService)->where('status' ,'positive')->count();
            $negative  = Survey::where('service_type' ,$this->selectedService)->where('status' ,'negative')->count();
            $all  = Survey::where('service_type' ,$this->selectedService)->count();

        }
      if( $this->service && $this->selectedService ){
            $positive  = Survey::where('service_id' , $this->service)->where('status' ,'positive')->count();
            $negative  = Survey::where('service_id' , $this->service)->where('status' ,'negative')->count();
            $all  = Survey::where('service_id' , $this->service)->count();
         
        }
   
        

        return view('livewire.survey-reports',[
            'options'=>$options,
            'selectedService'=> $this->selectedService ,
            'positive'=>$positive,
            'all'=>  $all,
            'service'=> $this->service,
            'negative' => $negative,

        ]);
    }
    

   
}
