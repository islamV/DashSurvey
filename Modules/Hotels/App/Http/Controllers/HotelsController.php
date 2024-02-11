<?php

namespace Modules\Hotels\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Hotels\App\Models\Hotel;
use Modules\Questions\App\Models\Question;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel = Hotel::get();
        $questions = Question::where('service_type' ,'hotels')->orderBy('created_at','desc')->take(5)->get();
        return view('hotels::index'  , compact('hotel','questions'));
        // return view('hotels::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('hotels::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('hotels::edit');
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
