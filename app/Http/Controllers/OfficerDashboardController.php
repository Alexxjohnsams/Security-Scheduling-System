<?php

namespace App\Http\Controllers;

use App\Models\OfficerDashboard;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use App\Models\shifts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OfficerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();

        $userId = Auth::user()->id;
        $getRole = User::where('role', ['user'])->where('id', $userId)->count();
        // $getRole = DB::table('User')->select('role')->where('id', '=' , $userId)-get();
        if($getRole > 0) {
            $message = "You have not been approved for duty yet!";
        } else {
            $message = "";
        }

        $getpendingShifts = shifts::where('user_id', $userId)->where('shift_status', ['pending'])->orderBy('formated_date', 'asc')->get();
        

        $Nextshift = shifts::select('date')->where('user_id', $userId)->where('shift_status', ['pending'])->orderBy('formated_date', 'asc')->first();
        return view('pages.dashboard', compact('users', 'locations', 'message', 'getpendingShifts', 'Nextshift'));

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
    public function edit($shift)
    {
        return shifts::find($shift);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        shifts::find($request->id)->update([
            'shift_status'=> $request->status,
        ]);
        
        Alert::success('success', 'Report Sent!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficerDashboard $officerDashboard)
    {
        //
    }
}
