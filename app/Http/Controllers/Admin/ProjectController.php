<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Models\Devlang;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $types = Type::all();
        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $devlangs = Devlang::all();
        return view('admin.projects.create', compact('types', 'devlangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $data['slug'] = $slug;
        if($request->hasFile('cover_image')){
            $path = Storage::put('post_images', $request->cover_image);
            $data['cover_image'] = $path;
        }

        $new_project = Project::create($data);

        if($request->has('devlangs')){
            $new_project->devlangs()->attach($request->devlangs);
        }

        return redirect()->route('admin.projects.show', $new_project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $devlangs = Devlang::all();
        return view('admin.projects.edit', compact('project', 'types', 'devlangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $data['slug'] = $slug;
        if($request->hasFile('cover_image')){
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $path = Storage::put('post_images', $request->cover_image);
            $data['cover_image'] = $path;
        }
        $updated = $project->title;
        $project->update($data);

        if($request->has('devlangs')){
            $project->devlangs()->sync($request->devlangs);
        } else {
            $project->devlangs()->sync([]);
        }
        
        return redirect()->route('admin.projects.index')->with('message', "$updated updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $deleted = $project->title;
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$deleted deleted successfully");
    }
}
