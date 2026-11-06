<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();

        return view('admin.projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image') && $imagePath = $request->file('image')->store('projects', 'public')) {
            $validatedData['image_path'] = $imagePath;
        }

        unset($validatedData['image']);

        Project::create($validatedData);

        return to_route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        $oldImagePath = $project->image_path;

        if ($request->hasFile('image') && $imagePath = $request->file('image')->store('projects', 'public')) {
            $validatedData['image_path'] = $imagePath;
        }

        unset($validatedData['image']);

        $project->update($validatedData);

        if (isset($validatedData['image_path']) && $oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        return to_route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }

        return to_route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
