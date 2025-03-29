<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->with('user')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Blogs/Index', [
            'blogs' => $blogs,
            'filters' => $request->only(['search']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Blogs/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return Inertia::render('Blogs/Show', [
            'blog' => $blog->load('user', 'comments'),
        ]);
    }

    public function edit(Blog $blog)
    {
        return Inertia::render('Blogs/Edit', [
            'blog' => $blog,
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validatedData['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}