<?php

namespace Modules\Surveys\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Guests\App\Models\Guest;
use Illuminate\Http\RedirectResponse;
use Modules\Hotels\App\Models\Hotel;
use Modules\Surveys\App\Models\Survey;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $survey = Survey::find(1);
    // dd($survey->q) ;
        
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
            ] ,[
                'phone' => 'الصيغة غير صحيحة' ,
            ]);
    $guestfind =  Guest::where('phone', $request->phone)->first();
   
    if(!$guestfind ){
        $guest = Guest::create($guest);
    }else{
         $guestfind->name = $request->name;
        $guestfind->save() ;
    }
    // chack if all answers is Satisfied
$status = 'positive' ;
foreach($request->answers as $answer){
    if($answer == 'NotSatisfied'){
        $status  =  'pending';
        break ;
    }
}
    $answers =json_encode( $request->answers);
   
      
    $data =  [
        'guest_id'=> $guest->id??  $guestfind->id ,
        'service_id'=> $request->service_branch,
        'service_type' => $service,
        'status' => $status,
        'answers'=> $answers,
        'note'=> $request->note,
    ];

    Survey::create($data);
   
    return redirect('/');


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
