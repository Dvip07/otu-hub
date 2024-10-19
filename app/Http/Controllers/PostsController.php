<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Posts;

class PostsController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostsRequest $request)
    {
         $validated = $request->validate([
            'community' => 'required|string',
            'postTitle' => 'required|string|max:255',
            'postDescription' => 'required|string|max:255',
            'link' => 'nullable|url',
            'fileUpload' => 'nullable|file|mimes:jpg,png,gif|max:2048',
        ]);

        // Handle file upload if applicable
        if ($request->hasFile('fileUpload')) {
            $path = $request->file('fileUpload')->store('uploads', 'public');
            // Store the file path or take further actions
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
