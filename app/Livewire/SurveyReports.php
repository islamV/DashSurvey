<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Services\App\Models\Service;
use Modules\Surveys\App\Models\Answer;
use Modules\Surveys\App\Models\Survey;

class SurveyReports extends Component
{

      public $selectedService = null;
      public $service ;
      public $section ;
      public $positive= 0;
      public $negative=0;
      public $all=0;
      public $filter = false;
      public $data = [];



    public function render(){
        $options = Service::where("type",$this->selectedService )->get();
        $sectionstrans = [
            'all' => [] ,
            'hotels' => [
                __('survey.Reception_Bellman'),
                __('survey.Reservation_checkin_checkout_riendly'),
                __('survey.Food'),
                __('survey.WI-FI'),
                __('survey.Resturant'),
                __('survey.coffe_shop'),
                __('survey.Swimmingpool_GYM'),
                __('survey.cleanliness_room'),
                __('survey.cleanliness_Area'),
                __('survey.Money')
            ],
            'hospitals' => [
                __('survey.Nurse'),
                __('survey.Service_Level'),
                __('survey.evaluation'),
                __('survey.Doctor')
            ],
            'clubs' => [
                __('survey.cleanliness'),
                __('survey.staff'),
                __('survey.services_provided'),
                __('survey.massage'),
                __('survey.Moroccan_bath'),
                __('survey.recommend'),
                __('survey.amenities'),
                __('survey.difficulties')
            ],
            'coffee_shops' => [
                __('survey.quality_coffee'),
                __('survey.bakery'),
                __('survey.candy'),
                __('survey.speed'),
                __('survey.quality'),
                __('survey.employees')
            ]
        ];
    
        
        return view('livewire.survey-reports',[
            'options'=>$options,
            'selectedService'=> $this->selectedService ,
            'positive'=>$this->positive,
            'all'=>  $this->all,
            'service'=> $this->service,
            'negative' => $this->negative,
            'sections' =>$this->selectedService?$sectionstrans[$this->selectedService]:[],
            'data' => $this->data,
            

        ]);
    }
    
    public function getResults()
    {
        switch(true) {
            case ($this->selectedService === 'all'):
            case ($this->service === 'all'):
            case ($this->section === 'all'):
                $this->selectedService = $this->service = $this->section = null;
                break;
        }
        

         $this->filter = true;
   

        $sections = [
            'hotels' => [
                'Reception_Bellman',

                'Reservation_checkin_checkout_riendly',
                'Resturant',
                'Food',
                'coffe_shop',
                'Swimmingpool_GYM',
                'cleanliness_room',
                'cleanliness_Area',
                'Money',
                'WI-FI'
            ],
            'hospitals' => [
                'Nurse',
                'Service_Level',
                'evaluation',
                'Doctor'
            ],
            'clubs' => [
                'cleanliness',
                'staff',
                'services_provided',
                'massage',
                'Moroccan_bath',
                'recommend',
                'amenities',
                'difficulties'
            ],
            'coffee_shops' => [
                'quality_coffee',
                'bakery',
                'candy',
                'speed',
                'quality',
                'employees'
            ]
        ];

        $this->positive  = Survey::where('status', 'positive')->count();
        $this->negative  = Survey::where('status', 'negative')->count();
        $this->all  = Survey::count();
        $this->data= Survey::get();
          
        if ($this->selectedService && !$this->service && !$this->section  ) {
            $this->data  = Survey::where('service_type', $this->selectedService)->get();
            $this->positive  = Survey::where('service_type', $this->selectedService)->where('status', 'positive')->count();
            $this->negative  = Survey::where('service_type', $this->selectedService)->where('status', 'negative')->count();
            $this->all  = Survey::where('service_type', $this->selectedService)->count();
        }
        if ($this->service && $this->selectedService  && !$this->section ) {
            $this->data  = Survey::where('service_type', $this->selectedService)->where('service_id', $this->service)->get();

            $this->positive  = Survey::where('service_id', $this->service)->where('service_type', $this->selectedService)->where('status', 'positive')->count();
            $this->negative  = Survey::where('service_id', $this->service)->where('service_type', $this->selectedService)->where('status', 'negative')->count();
            $this->all  = Survey::where('service_id', $this->service)->where('service_type', $this->selectedService)->count();
        }

        if ($this->selectedService && $this->service && $this->section) {
            $this->positive  = Answer::where('service_id', $this->service)->where('answer', 'Satisfied')->where('type', $this->selectedService)->where('type_service', $sections[$this->selectedService][$this->section])->count();
            $this->negative  = Answer::where('service_id', $this->service)->where('answer', 'NotSatisfied')->where('type', $this->selectedService)->where('type_service', $sections[$this->selectedService][$this->section])->count();
            $this->all  = Answer::where('service_id', $this->service)->where('type', $this->selectedService)->where('type_service', $sections[$this->selectedService][$this->section])->count();
        }
        if ($this->selectedService && !$this->service && $this->section) {
            $this->data  = Answer::where('type', $this->selectedService)->where('type_service', $sections[$this->selectedService][$this->section])->get();
            $this->positive  = Answer::where('answer', 'Satisfied')->where('type', $this->selectedService)->where('type_service', $sections[$this->selectedService][$this->section])->count();
            $this->negative  = Answer::where('answer', 'NotSatisfied')->where('type', $this->selectedService)->where('type_service', $sections[$this->selectedService][$this->section])->count();
            $this->all  = Answer::where('type', $this->selectedService)->where('type_service', $sections[$this->selectedService][$this->section])->count();
        }

}
}
