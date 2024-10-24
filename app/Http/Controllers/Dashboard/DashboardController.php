<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;
use App\Models\Community;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.dashboards-analytics');
    }

    public function crm(){
        return view('dashboard.dashboards-crm');
    }

    public function view(){
        return view('dashboard.view-profile');
    }

    public function add(){
        return view('dashboard.add-post');
    }

    public function createCommunity(){
        return view('dashboard.create-community');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::user()->id;    
        $community = new Community();
        $community->name = $request->name;
        $community->avatar = $request->avatar;
        $community->user_id = $user_id;
        $community->save();
        // $validated = $request->validated();
        // $community = Community::create($validated);

        return redirect()->route('create-community');
    }

}
