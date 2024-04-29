<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $projects = Project::query()->join('users_projects', 'projects.id', '=', 'users_projects.project_id')
            ->where('users_projects.user_id', $userId)
            ->get();

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
            $project = Project::query()->find($project->id);

            if (!$project->exists()) {
                return redirect('dashboard');
            }

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
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
