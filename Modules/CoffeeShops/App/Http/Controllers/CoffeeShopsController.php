<?php

namespace Modules\CoffeeShops\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CoffeeShops\App\Models\CoffeeShop;
use Modules\Questions\App\Models\Question;
class CoffeeShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coffeeShop = CoffeeShop::get();
        $questions = Question::where('service_type' ,'coffee_shops')->orderBy('created_at','desc')->take(5)->get();
        return view('coffeeshops::index'  , compact('coffeeShop','questions'));
      
        // return view('coffeeshops::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coffeeshops::create');
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
        return view('coffeeshops::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('coffeeshops::edit');
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
