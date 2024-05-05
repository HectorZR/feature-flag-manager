<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = $request->user()->projects;

        return view('dashboard', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            $user = $request->user();

            $project = new Project($validated);

            $project->saveOrFail();

            $project->users()->attach($user->id);

            return redirect('dashboard', 201);
        } catch (\Exception $th) {
            return redirect('project/create')->withErrors($th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        try {
            $project = Project::query()->findOrFail($project->id)->load('environments.featureFlags');

            return view('project.show', ['project' => $project]);
        } catch (\Exception $th) {
            return redirect('dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        try {
            $project = Project::query()->findOrFail($project->id);

            return view('project.edit', ['project' => $project]);
        } catch (\Exception $th) {
            return redirect('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            $validated = $request->validated();

            $storedProject = Project::query()->findOrFail($project->id);

            $storedProject->fill($validated);

            $storedProject->saveOrFail();

            return redirect()->route('project.show', ['project' => $project]);
        } catch (\Exception $th) {
            return redirect(
                'project.edit'
            )->with('project', $project)->withErrors($th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $project = Project::query()->findOrFail($project->id);

            $project->users()->detach();

            $project->delete();

            return redirect('dashboard');
        } catch (\Exception $th) {
            ddd($th);
            return redirect()->withErrors($th->getMessage());
        }
    }
}
