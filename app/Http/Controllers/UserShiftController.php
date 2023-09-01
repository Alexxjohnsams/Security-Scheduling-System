<?php

namespace App\Http\Controllers;

use App\Models\userShift;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use App\Models\shifts;

class UserShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();

        $userSh = auth()->user();
        $userid = $userSh -> id;
        $shifts = shifts::where('user_id', $userid)->get();
        $usershiftcout = shifts::where('user_id', $userid)->count();
        return view('pages.usershift', compact('users', 'locations', 'shifts', 'usershiftcout'));
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
    public function show(userShift $userShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(userShift $userShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, userShift $userShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(userShift $userShift)
    {
        //
    }
}
