<?php

namespace App\Http\Controllers;

use App\Models\shifts;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;

class ShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();

        $date = Carbon::today();
        $today = $date -> format('l, jS F, Y');
        
        $day = $date -> format('l');
        $daydate = $date -> format('jS F, Y');

        $shifts = shifts::where('date', $today)->get();
        return view('pages.shifts', compact('users', 'locations', 'shifts' , 'day', 'daydate'));
    }

    public function allindex()
    {
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();
        
        $shifts = shifts::all();
        return view('pages.allshifts', compact('users', 'locations', 'shifts'));
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
        $inputDate = Carbon::parse($request->date); 
        $nowdate = Carbon::now();

        $date = $inputDate->setTime(0, 0, 0);
        $todays = $nowdate->setTime(0, 0, 0);

        $storedate = $inputDate->format('l, jS F, Y');

        $existingShift = Shifts::where('location', $request->location)
                            ->where('date', $date)
                            ->count();

        $officerAtSameShift = Shifts::where('user_id', $request->officer_name)
                                    ->where('date', $storedate)
                                    ->where('location', $request->location)
                                    ->count();

        $officerOfficer = Shifts::where('user_id', $request->officer_name)
                                ->where('date', $storedate)
                                ->count();

        if ($date->isBefore($todays)) {
            Alert::error('Error', 'Invalid Date!');
            return redirect()->back();
        } elseif($existingShift > 0) {
            Alert::error('Error', 'Already someone in this location.');
            return redirect()->back();
        } elseif($officerAtSameShift > 0) {
            Alert::error('Error', 'This officer is already posted to this location.');
            return redirect()->back();
        } elseif($officerOfficer > 0) {
            Alert::error('Error', 'This officer is already posted at another location.');
            return redirect()->back();
        } else {
            $user = User::find($request->officer_name);
                if ($user) {
                $staffname = $user->name;
                Shifts::create([
                    'user_id' => $request->officer_name,
                    'officer_name' => $staffname,
                    'location' => $request->location,
                    'date' => $storedate,
                ]);

                Alert::success('Success', 'Officer Scheduled Successfully!');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Invalid Officer Selected');
                return redirect()->back();
            }
        }
        
    }


    public function getSOfficer($officer)
    {
        $officer = DB::table('users')->where('id', $officer)->get();
        return $officer;
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
