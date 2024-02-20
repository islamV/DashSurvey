<?php

namespace Modules\Surveys\App\Http\Controllers;

use App\Models\AdminGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Modules\Guests\App\Models\Guest;
use Modules\Hotels\App\Models\Hotel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Surveys\App\Models\Answer;
use Modules\Surveys\App\Models\Survey;
use Modules\Complaints\App\Models\Complaint;
use Modules\Questions\App\Models\Question;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function typeServiceTrans(){
        $answers = Answer::select('type_service')->distinct()->pluck('type_service');

    
        foreach ($answers as $kay => $label) {
            $labels[$kay]= __('survey.'. $label);
    
        }  
    return  $labels ;
    }  
   
	
    public function index()
    {
          
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
    
     $guest = Guest::create($guest);
    }else{
         $guestfind->name = $request->name;
        $guestfind->save() ;
    }
 
      
    $data =  [
        'guest_id'=> $guest->id??  $guestfind->id ,
        'service_id'=> $request->service_branch,
        'service_type' => $service,
        'status' => in_array("NotSatisfied" ,$request->answers) ? 'pending' : 'positive',
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
        $ans->save() ;
     }
   
    return redirect('done');


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
