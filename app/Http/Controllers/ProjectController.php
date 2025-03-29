<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::query()
            ->with(['business', 'user'])
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Projects/Index', [
            'projects' => $projects,
            'filters' => $request->only(['search']),
            'businesses' => Business::all(['id', 'name']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Projects/Create', [
            'businesses' => Business::all(['id', 'name']),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
        ]);

        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return Inertia::render('Projects/Show', [
            'project' => $project->load(['business', 'user', 'collaborations']),
        ]);
    }

    public function edit(Project $project)
    {
        return Inertia::render('Projects/Edit', [
            'project' => $project,
            'businesses' => Business::all(['id', 'name']),
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validatedData['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}