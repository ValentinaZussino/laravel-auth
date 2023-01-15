<?php

namespace App\Http\Controllers\Admin;

use App\Models\Devlang;
use App\Http\Requests\StoreDevlangRequest;
use App\Http\Requests\UpdateDevlangRequest;
use App\Http\Controllers\Controller;

class DevlangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDevlangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDevlangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devlang  $devlang
     * @return \Illuminate\Http\Response
     */
    public function show(Devlang $devlang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devlang  $devlang
     * @return \Illuminate\Http\Response
     */
    public function edit(Devlang $devlang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDevlangRequest  $request
     * @param  \App\Models\Devlang  $devlang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevlangRequest $request, Devlang $devlang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devlang  $devlang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devlang $devlang)
    {
        //
    }
}
