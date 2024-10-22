<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEngagementRequest;
use App\Http\Requests\UpdateEngagementRequest;
use App\Models\Engagement;

class EngagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEngagementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Engagement $engagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Engagement $engagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEngagementRequest $request, Engagement $engagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Engagement $engagement)
    {
        //
    }
}
