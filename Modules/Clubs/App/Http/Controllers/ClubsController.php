<?php

namespace Modules\Clubs\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Clubs\App\Models\Club;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Questions\App\Models\Question;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::get();
        $questions = Question::where('service_type' ,'clubs')->orderBy('created_at','desc')->take(5)->get();
        return view('clubs::index'  , compact('clubs','questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clubs::create');
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
        return view('clubs::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('clubs::edit');
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
