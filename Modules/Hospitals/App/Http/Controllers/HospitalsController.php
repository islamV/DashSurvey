<?php

namespace Modules\Hospitals\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Hospitals\App\Models\Hospital;
use Modules\Questions\App\Models\Question;

class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $hospital = Hospital::get();
        $questions = Question::where('service_type' ,'hospitals')->orderBy('created_at','desc')->take(5)->get();
        return view('hospitals::index'  , compact('hospital','questions'));
        // return view('hospitals::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospitals::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('hospitals::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('hospitals::edit');
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
