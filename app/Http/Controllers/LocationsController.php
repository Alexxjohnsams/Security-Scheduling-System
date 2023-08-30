<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNotIn('role', ['admin'])->get();
        $locations = Locations::all();
        return view('pages.locations', compact('users', 'locations'));
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
        Locations::create([
            'location_name' => $request -> location_name
        ]);

        Alert::success('Success', 'New Location Addedd Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Locations $locations)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locations $locations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Locations $locations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locations $locations)
    {
        //
    }
}
