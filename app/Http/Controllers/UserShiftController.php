<?php

namespace App\Http\Controllers;

use App\Models\userShift;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use App\Models\shifts;
use Carbon\Carbon;

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
        $shifts = shifts::where('user_id', $userid)->where('shift_status', ['completed'])->get();
        $usershiftcout = shifts::where('user_id', $userid)->where('shift_status', ['completed'])->count();

        $getAbscentCount = shifts::where('user_id', $userid)->where('shift_status', ['absent'])->count();

        $today = Carbon::now()->setTime(0, 0, 0);
        $tommorow = $today->copy()->addDay();

        // $shiftDate = shifts::select('formated_date')->whereLessThan($today)->get();

        $getRole = User::where('role', ['user'])->where('id', $userid)->count();
        if($getRole > 0) {
            $message = "You have no history because you have not been approved for duty!";
        } else {
            $message = "";
        }

        if($shifts->isEmpty()) {
            $shift_message = "No shift history yet!";
        } else {
            $shift_message = "";
        }

        
        
        return view('pages.usershift', compact('users', 'locations', 'shifts', 'usershiftcout', 'message', 'getAbscentCount', 'shift_message'));
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
