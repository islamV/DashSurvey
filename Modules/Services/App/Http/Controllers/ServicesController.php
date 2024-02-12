<?php

namespace Modules\Services\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Questions\App\Models\Question;
use Modules\Services\App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($service)
    {
      
        
            $services = Service::where('type' , $service)->get();
            $questions  = Question::where('type' ,$service)->take(5)->get();
          
           
            return view("surveys::".$service,compact('services','questions' , 'service'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('services::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('services::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
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
