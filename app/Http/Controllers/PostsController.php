<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostsRequest $request)
    {
        $validatedData = $request->validated();

        // Handle file upload
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $filePath = $file->store('uploads', 'public');
            $validatedData['media'] = $filePath;
        }

        $validatedData['user_id'] = Auth::id();
        // dd($validatedData);

        $post = Posts::create($validatedData);

        if ($post) {
            // Redirect to a success page or show a success message
            return redirect()->route('posts.index')->with('success', 'Post created successfully!');
        } else {
            // Handle errors and redirect back to the form with error messages
            return back()->withErrors($validatedData)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        // $posts = Posts::find($posts->id);

        // return view('posts.show', compact('posts'));
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
