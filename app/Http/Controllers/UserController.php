<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Engagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::with('engagement')->get();
        // return view('users.index', compact('users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $userId = Auth::user()->id;

        // $users = User::with('engagement')->where('id', $id)->get();
        $users = User::where('id', $id)->get();
        return view('users.index', compact('users'));
    }

    /**
     * Change Password.
     */
    public function changePassword(Request $request, string $id)
    {

        $request->validate([
            'newPassword' => 'required|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[!@#$%^&*]/',
        ]);

        // Find the user by ID
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $password = Hash::make($request->newPassword);

        // Update the user's password
        $user->password = $password;

        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
