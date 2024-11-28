<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Posts;
use App\Models\User;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\Comments;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::with([
            'likes' => function ($query) {
                $query->where('user_id', Auth::id());
            }
        ])->get();
        foreach ($posts as $post) {
            $post->userHasLiked = $post->likes->isNotEmpty(); // Check if there are any likes by the current user
        }
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $user_id = Auth::user()->id;
    // Check if the current user is affiliated with any community using Eloquent
    $community = Community::with('user')->where('user_id', $user_id)->get();
    // dd($community);
    return view('posts.create', compact('community'));
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
            $timestamp = now()->format('YmdHis');

            // Temporarily save the post to get the ID
            $post = new Posts($validatedData);
            $post->user_id = Auth::id();
            $post->save();

            // Create a custom file name using post_id and timestamp
            $fileName = 'post_' . $post->id . '_' . $timestamp . '.' . $file->getClientOriginalExtension();

            // Move the file directly into the public directory
            $file->move(public_path('uploads'), $fileName);

            // Save the relative path to the database
            $post->update(['media' => 'uploads/' . $fileName]);

            return redirect()->route('posts.index')->with('success', 'Post created successfully!');
        } else {
            return back()->withErrors($validatedData)->withInput();
        }
    }



    public function viewPost($id)
    {
        $post = Posts::with('comments')->find($id);
        $comments = Comments::with('user', 'post')->where('post_id', $id)->get();
        return view('posts.viewPost', compact('post', 'comments'));
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
