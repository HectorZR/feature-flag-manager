<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnvironmentRequest;
use App\Http\Requests\UpdateEnvironmentRequest;
use App\Models\Environment;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class EnvironmentController extends Controller
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
    public function create(Project $project)
    {
        try {
            $validatedProject = Project::findOrFail($project->id);

            return view('environment.create', ['project' => $validatedProject]);
        } catch (\Exception $th) {
            return back()->withErrors($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnvironmentRequest $request, Project $project)
    {
        try {
            DB::beginTransaction();

            Project::findOrFail($project->id);

            $fields = $request->validated();

            $fields['project_id'] = $project->id;

            $environment = new Environment($fields);

            $environment->project()->associate($project);
            $environment->saveOrFail();

            $response = redirect()->route('project.show', $project)->with('success', 'Environment created successfully');

            DB::commit();

            return $response;
        } catch (\Exception $th) {
            DB::rollBack();
            return back()->withErrors($th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Environment $environment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Environment $environment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnvironmentRequest $request, Environment $environment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Environment $environment)
    {
        //
    }
}
