<?php

namespace App\Http\Controllers;

use App\Models\OfficerDashboard;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use App\Models\shifts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OfficerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();

        $user = Auth::user()->id;            
        return view('pages.dashboard', compact('users', 'locations'));

        // $nextshift = shifts::select('date')->where('id', $user)
        //             ->where('date', '>', $today)->first();
        // return view('pages.dashboard', compact('users', 'locations', 'nextshift'));
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
    public function show(OfficerDashboard $officerDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficerDashboard $officerDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OfficerDashboard $officerDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficerDashboard $officerDashboard)
    {
        //
    }
}
