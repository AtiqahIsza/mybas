<?php

namespace App\Http\Controllers;

use App\Models\BusStand;
use Illuminate\Http\Request;

class BusStandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.manageBusStand');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusStand  $busStand
     * @return \Illuminate\Http\Response
     */
    public function show(BusStand $busStand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusStand  $busStand
     * @return \Illuminate\Http\Response
     */
    public function edit(BusStand $busStand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusStand  $busStand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusStand $busStand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusStand  $busStand
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusStand $busStand)
    {
        //
    }
}