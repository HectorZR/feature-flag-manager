<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeatureFlagRequest;
use App\Http\Requests\UpdateFeatureFlagRequest;
use App\Models\FeatureFlag;

class FeatureFlagController extends Controller
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
    public function store(StoreFeatureFlagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FeatureFlag $featureFlag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeatureFlag $featureFlag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureFlagRequest $request, FeatureFlag $featureFlag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureFlag $featureFlag)
    {
        //
    }
}
