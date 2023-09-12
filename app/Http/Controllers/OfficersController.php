<?php

namespace App\Http\Controllers;

use App\Models\Officers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use RealRashid\SweetAlert\Facades\Alert;

class OfficersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $allusers = User::whereNotIn('role', ['admin'])->get();
        $locations = Locations::all();

        if($allusers->isEmpty()) {
            $message = "No Officer Registered Yet!";
        } else {
            $message = "";
        }
        return view('pages.officers', compact('users', 'locations', 'allusers', 'message'));
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
    public function show(Officers $officers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($officer)
    {
        return User::find($officer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        User::find($request->id)->update([
            'role'=> $request->role,
        ]);
        
        Alert::success('success', 'Officer Status updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officers $officers)
    {
        //
    }
}
