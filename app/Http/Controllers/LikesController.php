<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLikesRequest;
use App\Http\Requests\UpdateLikesRequest;
use App\Models\Likes;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
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
    public function store(StoreLikesRequest $request)
    {
        $user_id = Auth::user()->id;
        // Check if the user already liked the post
        $existing_like = Likes::where('post_id', $request->post_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existing_like) {
            $existing_like->delete();
            return response()->json(['status' => 'already_liked', 'message' => 'You have already liked this post']);
        }

        Likes::create([
            'post_id' => $request->post_id,
            'user_id' => $user_id,
        ]);

        return response()->json(['status' => 'liked', 'message' => 'Great that you like this post']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Likes $likes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikesRequest $request, Likes $likes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Likes $likes)
    {
        //
    }
}
