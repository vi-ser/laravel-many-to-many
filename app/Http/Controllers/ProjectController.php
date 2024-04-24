<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin/projects/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();

        return view('admin/projects/create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();
        $newProject = new Project();

        if ($request->hasFile('src')) {

            $path = Storage::disk('public')->put('project_images', $request->src);

            $newProject->src = $path;
        }

        $newProject->fill($request->all());
        $newProject->date = $request->date;

        $newProject->save();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $request->validated();

        if ($request->hasFile('src')) {

            $path = Storage::disk('public')->put('project_images', $request->src);

            $project->src = $path;
        }

        $project->update($request->all());
        $project->date = $request->date;

        $project->save();

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');

    }
}
