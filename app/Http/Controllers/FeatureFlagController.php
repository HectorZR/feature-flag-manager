<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeatureFlagRequest;
use App\Http\Requests\UpdateFeatureFlagRequest;
use App\Models\Environment;
use App\Models\FeatureFlag;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

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
    public function create(Project $project, Environment $environment)
    {
        return view('feature-flag.create', compact('project', 'environment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureFlagRequest $request, Project $project, Environment $environment)
    {
        try {
            DB::beginTransaction();
            Project::findOrFail($project->id);
            Environment::findOrFail($environment->id);
            $fields = $request->validated();


            $featureFlag = new FeatureFlag($fields);

            $featureFlag->environment()->associate($environment);

            $featureFlag->validateUniquenessOnStore();

            $featureFlag->save();

            $environment->refresh();

            $response = redirect()->route('project.environment.show', [$project, $environment]);

            DB::commit();

            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while creating the feature flag.')->withErrors($e->getMessage())->withInput();
        }
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
