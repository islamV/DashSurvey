<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Services\App\Models\Service;
use Modules\Surveys\App\Models\Answer;
use Modules\Complaints\App\Models\Complaint;

class ComplaintReports extends Component
{


    public $selectedService = null;
    public $service;
    public $section;
    public $positive = 0;
    public $negative = 0;
    public  $pending = 0;
    public $all = 0;
    public $filter = false;
    public $data = [];
    public $fromDate;
    public $toDate;



    public function mount()
    {
        $this->fromDate =  '2024-01-01';
        $this->toDate =  now()->toDate()->format('Y-m-d');
    }
    public function render()
    {
        $options = Service::where("type", $this->selectedService)->get();
        $sectionstrans = [
            'all' => [],
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


        return view('livewire.complaint-reports', [
            'options' => $options,
            'selectedService' => $this->selectedService,
            'positive' => $this->positive,
            'all' =>  $this->all,
            'service' => $this->service,
            'pending' => $this->pending,
            'negative' => $this->negative,
            'sections' => $this->selectedService ? $sectionstrans[$this->selectedService] : [],
            'data' => $this->data,



        ]);
    }

    public function getResults()
    {

        switch (true) {
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

        $this->positive  = Complaint::TypeOfComplaint('status', 'positive', $this->fromDate, $this->toDate)->count();



        $this->pending  = Complaint::TypeOfComplaint('status', 'pending', $this->fromDate, $this->toDate)->count();


        $this->negative  = Complaint::TypeOfComplaint('status', 'negative', $this->fromDate, $this->toDate)->count();


        $this->all  = Complaint::TypeOfComplaint('status', ' ', $this->fromDate, $this->toDate)->count();


        $this->data = Complaint::TypeOfComplaint('status', '', $this->fromDate, $this->toDate)->get();




        if ($this->selectedService && !$this->service) {
            $this->data  = Complaint::TypeOfComplaint('type', $this->selectedService, $this->fromDate, $this->toDate)->get();


            $this->positive  = Complaint::SelectedService('type',  $this->selectedService, 'status', 'positive', $this->fromDate, $this->toDate)->count();


            $this->pending  = Complaint::SelectedService('type', $this->selectedService, 'status', 'pending', $this->fromDate, $this->toDate)->count();


            $this->negative  = Complaint::SelectedService('type', $this->selectedService, 'status', 'negative', $this->fromDate, $this->toDate)->count();

            $this->all  = Complaint::TypeOfComplaint('type', $this->selectedService, $this->fromDate, $this->toDate)->count();
        }

        if ($this->service && $this->selectedService) {
            $this->data  = Complaint::SelectedService('type', $this->selectedService, 'service_id', $this->service, $this->fromDate, $this->toDate)->get();




            $this->positive  = Complaint::Services(
                'service_id',
                $this->service,
                'type',
                $this->selectedService,
                'status',
                'positive',
                $this->fromDate,
                $this->toDate
            )->count();


            $this->pending  = Complaint::Services(
                'service_id',
                $this->service,
                'type',
                $this->selectedService,
                'status',
                'pending',
                $this->fromDate,
                $this->toDate
            )->count();



            $this->negative  = Complaint::Services(
                'service_id',
                $this->service,
                'type',
                $this->selectedService,
                'status',
                'negative',
                $this->fromDate,
                $this->toDate
            )->count();



            $this->all  = Complaint::SelectedService('type', $this->selectedService, 'service_id', $this->service, $this->fromDate, $this->toDate)->count();
        }
    }
}
