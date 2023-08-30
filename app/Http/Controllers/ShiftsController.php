<?php

namespace App\Http\Controllers;

use App\Models\shifts;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class ShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNotIn('role', ['admin'])->get();
        $locations = Locations::all();

        $date = Carbon::today();
        $today = $date -> format('l, jS F, Y');
        
        $day = $date -> format('l');
        $daydate = $date -> format('jS F, Y');

        $shifts = shifts::where('date', $today)->get();
        return view('pages.shifts', compact('users', 'locations', 'shifts' , 'day', 'daydate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $inputDate = Carbon::parse($request -> date);
        $date = $inputDate -> format('l, jS F, Y');

        shifts::create([
            'officer_name' => $request -> officer_name,
            'location' => $request -> location,
            'date' => $date,
        ]);

        Alert::success('Success', 'Officer Scheduled Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(shifts $shifts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(shifts $shifts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, shifts $shifts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(shifts $shifts)
    {
        //
    }
}
