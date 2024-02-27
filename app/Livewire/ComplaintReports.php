<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Services\App\Models\Service;
use Modules\Surveys\App\Models\Answer;
use Modules\Complaints\App\Models\Complaint;

class ComplaintReports extends Component
{

      public $selectedService = null;
      public $service ;
      public $section ;
    



    public function render(){
        $options = Service::where("type",$this->selectedService )->get();
        $sectionstrans = [
            'hotels' => [
                __('survey.Reception_Bellman'),
                __('survey.Reservation_checkin_checkout_riendly'),
                __('survey.Resturant'),
                __('survey.Food'),
                __('survey.coffe_shop'),
                __('survey.Swimmingpool_GYM'),
              
                __('survey.cleanliness_room'),
                __('survey.cleanliness_Area'),
                __('survey.Money'),
                __('survey.WI-FI')

             
              
                
            ],
            'hospitals' => [
                __('survey.Nurse'),
                __('survey.services_Level'),
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
        
        $positive  = Complaint::where('status' ,'positive')->count();
        $negative  = Complaint::where('status' ,'negative')->count();
       $pending  = Complaint::where('status' ,'pending')->count();
        $all  = Complaint::count();
        if($this->selectedService  && !$this->service &&!$this->section ){
            $positive  = Complaint::where('type' ,$this->selectedService)->where('status' ,'positive')->count();
            $negative  = Complaint::where('type' ,$this->selectedService)->where('status' ,'negative')->count();
             $pending  = Complaint::where('type' ,$this->selectedService)->where('status' ,'pending')->count();
            $all  = Complaint::where('type' ,$this->selectedService)->count();

        }
      if( $this->service && $this->selectedService && !$this->section ){
            $positive  = Complaint::where('service_id' , $this->service)->where('status' ,'positive')->count();
            $negative  = Complaint::where('service_id' , $this->service)->where('status' ,'negative')->count();
             $pending  = Complaint::where('service_id' , $this->service)->where('status' ,'pending')->count();
            $all  = Complaint::where('service_id' , $this->service)->count();
         
        }
     
    
 
        return view('livewire.complaint-reports',[
            'options'=>$options,
            'selectedService'=> $this->selectedService ,
            'positive'=>$positive,
            'all'=>  $all,
            'service'=> $this->service,
            'negative' => $negative,
            'pending'=>$pending,

        ]);
    }
    

   
}
