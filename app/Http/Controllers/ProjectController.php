<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('dashboard', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $data['image_url'] = $request->file('image')->store('projects', 'public');
            }
            Project::create($data);
            return redirect()->route('dashboard')->with('success', 'Project added.');
        } catch (\Exception $e) {
            Log::error("Store Error: " . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to save.');
        }
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(StoreProjectRequest $request, Project $project)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                if ($project->image_url) {
                    Storage::disk('public')->delete($project->image_url);
                }
                $data['image_url'] = $request->file('image')->store('projects', 'public');
            }
            $project->update($data);
            return redirect()->route('dashboard')->with('success', 'Updated successfully.');
        } catch (\Exception $e) {
            Log::error("Update Error: " . $e->getMessage());
            return back()->with('error', 'Update failed.');
        }
    }

    public function destroy(Project $project)
    {
        if ($project->image_url) {
            Storage::disk('public')->delete($project->image_url);
        }
        $project->delete();
        return redirect()->route('dashboard')->with('success', 'Project removed.');
    }
}