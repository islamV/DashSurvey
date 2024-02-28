<?php

namespace Modules\Surveys\App\Http\Controllers;

use App\Models\AdminGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Modules\Guests\App\Models\Guest;
use Modules\Hotels\App\Models\Hotel;
use Illuminate\Http\RedirectResponse;
use Modules\Surveys\App\Models\Answer;
use Modules\Surveys\App\Models\Survey;
use Modules\Services\App\Models\Service;
use Modules\Questions\App\Models\Question;
use Modules\Complaints\App\Models\Complaint;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
   
	
    public function index(Request $request)
    {
        $options = Service::where("type",$request->selectedService)->get()??[];
        $sectionstrans = [
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

        
        $positive  = Survey::where('status', 'positive')->count();
        $negative  = Survey::where('status', 'negative')->count();
        $all  = Survey::count();
        $data= Survey::get();
        if ($request->selectedService  && !$request->service && !$request->section) {
            $data  = Survey::where('service_type', $request->selectedService)->get();
            $positive  = Survey::where('service_type', $request->selectedService)->where('status', 'positive')->count();
            $negative  = Survey::where('service_type', $request->selectedService)->where('status', 'negative')->count();
            $all  = Survey::where('service_type', $request->selectedService)->count();
        }
        if ($request->service && $request->selectedService && !$request->section) {
            $data  = Survey::where('service_type', $request->selectedService)->where('service_id', $request->service)->get();

            $positive  = Survey::where('service_id', $request->service)->where('service_type', $request->selectedService)->where('status', 'positive')->count();
            $negative  = Survey::where('service_id', $request->service)->where('service_type', $request->selectedService)->where('status', 'negative')->count();
            $all  = Survey::where('service_id', $request->service)->where('service_type', $request->selectedService)->count();
        }

        if ($request->selectedService && $request->service && $request->section) {
            $positive  = Answer::where('service_id', $request->service)->where('answer', 'Satisfied')->where('type', $request->selectedService)->where('type_service', $sections[$request->selectedService][$request->section])->count();
            $negative  = Answer::where('service_id', $request->service)->where('answer', 'NotSatisfied')->where('type', $request->selectedService)->where('type_service', $sections[$request->selectedService][$request->section])->count();
            $all  = Answer::where('service_id', $request->service)->where('type', $request->selectedService)->where('type_service', $sections[$request->selectedService][$request->section])->count();
        }
        if ($request->selectedService && !$request->service && $request->section) {
            $data  = Answer::where('type', $request->selectedService)->where('type_service', $sections[$request->selectedService][$request->section])->get();

            $positive  = Answer::where('answer', 'Satisfied')->where('type', $request->selectedService)->where('type_service', $sections[$request->selectedService][$request->section])->count();
            $negative  = Answer::where('answer', 'NotSatisfied')->where('type', $request->selectedService)->where('type_service', $sections[$request->selectedService][$request->section])->count();
            $all  = Answer::where('type', $request->selectedService)->where('type_service', $sections[$request->selectedService][$request->section])->count();
        }
         

        return compact(['positive' ,'negative' ,'all' ,'data' ,'options']);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surveys::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$service){
   
       $guest = $request->validate([
            'name'=> 'required|string',
            'phone' => 'required',
            'service_type'
            ] ,[
                'phone' => 'الصيغة غير صحيحة' ,
            ]);
    $guestfind =  Guest::where('phone', $request->phone)->where('service_type'  , $service)->first();
   
    if(!$guestfind ){
        $guest['service_type'] = $service;
        $guest['service_id'] = $request->service_branch;
    
     $guest = Guest::create($guest);
  
    }else{
         $guestfind->name = $request->name;
        $guestfind->save() ;
    }
    // dd($guest);
      
    $data =  [
        'guest_id'=> $guest->id??  $guestfind->id ,
        'service_id'=> $request->service_branch,
        'service_type' => $service,
        'status' => in_array("NotSatisfied" ,$request->answers) ? 'negative' : 'positive',
        'note'=> $request->note,
    ];

    $survey = Survey::create($data);
    if (in_array("NotSatisfied" ,$request->answers)){
       $complaint=  Complaint::create([
            'status' => 'pending' ,
            'type' =>  $service ,
            'show_status' => false  ,
            'guest_id'=> $guest->id??$guestfind->id,
            'survey_id' => $survey->id,
            'service_id'=> $request->service_branch,

          ]) ;
        
          event(new \App\Events\Complaint($complaint));
       }
    foreach($request->answers as $key=>  $answer){
       $question = Question::find($key) ;
        $ans = new Answer;
        $ans->survey_id = $survey->id ;
        $ans->question_id = $key ;
        $ans->answer = $answer; 
        $ans->type_service= $question->type_service;
        $ans->type= $question->type;
        $ans->service_id=  $request->service_branch;
        $ans->save() ;
     }
   
    return redirect()->route('done',['s'=>$service]);


    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('surveys::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('surveys::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
