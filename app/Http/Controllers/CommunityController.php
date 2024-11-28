<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Http\Requests\StorePostsRequest;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Posts;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('communities.create-community');
    }

    public function createCommunityPost(Community $community)
    {
        $community = Community::find($community->id);
        return view('communities.create-post', compact('community'));
    }

    public function storeCommunityPost(StorePostsRequest $request, Community $community)
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommunityRequest $request)
    {
        $validated = $request->validated();

        // Create the community first to get its ID
        $community = new Community($validated);
        $community->save();

        // Handle file upload if communityAvatar exists
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $timestamp = now()->format('YmdHis');

            // Create a folder using the community name (sanitize the name)
            $folderName = Str::slug($community->name, '_');
            $directoryPath = public_path('uploads/' . $folderName);

            // Ensure the directory exists
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true);
            }

            // Create a custom file name
            $fileName = 'community_' . $community->id . '_' . $timestamp . '.' . $file->getClientOriginalExtension();

            // Move the file to the new folder
            $file->move($directoryPath, $fileName);

            // Save the relative path to the database
            $community->update(['avatar' => 'uploads/' . $folderName . '/' . $fileName]);
        }

        // Redirect after successful creation
        return redirect()->route('community.index')->with('success', 'Community created successfully.');
    }



    // public function store(StorePostsRequest $request)
    // {
    //     $validatedData = $request->validated();

    //     // Handle file upload
    //     if ($request->hasFile('media')) {
    //         $file = $request->file('media');
    //         $timestamp = now()->format('YmdHis');

    //         // Temporarily save the post to get the ID
    //         $post = new Posts($validatedData);
    //         $post->user_id = Auth::id();
    //         $post->save();

    //         // Create a custom file name using post_id and timestamp
    //         $fileName = 'post_' . $post->id . '_' . $timestamp . '.' . $file->getClientOriginalExtension();

    //         // Move the file directly into the public directory
    //         $file->move(public_path('uploads'), $fileName);

    //         // Save the relative path to the database
    //         $post->update(['media' => 'uploads/' . $fileName]);

    //         return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    //     } else {
    //         return back()->withErrors($validatedData)->withInput();
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        $community = Community::with('posts.user')->find($community->id);


        // dd($community);
        // Pass the community details to a view
        return view('communities.show', compact('community'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommunityRequest $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        //
    }
}
