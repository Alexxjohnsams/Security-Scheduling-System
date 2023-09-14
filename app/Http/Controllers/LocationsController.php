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
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();
        if($locations->isEmpty()) {
            $message = "No Location added Yet!";
        } else {
            $message = "";
        }
        return view('pages.locations', compact('users', 'locations', 'message'));
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
    public function edit($location)
    {
        return Locations::find($location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        Locations::find($request->location_id)->update([
            'location_name'=> $request->location_name,
        ]);
        
        Alert::success('success', 'Location updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locations $locations)
    {
        //
    }
}
