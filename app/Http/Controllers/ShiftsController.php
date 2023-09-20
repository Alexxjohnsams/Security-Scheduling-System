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
        if($shifts->isEmpty()) {
            $message = "There are no officers on post today";
        } else {
            $message = "";
        }
        

        return view('pages.shifts', compact('users', 'locations', 'shifts' , 'day', 'daydate', 'message'));
    }

    public function allindex()
    {
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();
        
        $shifts = shifts::all();
        return view('pages.allshifts', compact('users', 'locations', 'shifts'));
    }


    public function pendingindex() 
    {
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();
        
        $shifts = shifts::where('shift_status', ['pending'])->orderBy('formated_date', 'asc')->get();
        return view('pages.pendingshifts', compact('users', 'locations', 'shifts'));
    }

    public function viewhistory($id)
    {
        // $shift = shifts::find($id);
        $users =  User::whereNotIn('role', ['admin'])->where('role', ['officer'])->get();
        $locations = Locations::all();

        $shifts = shifts::where('user_id', $id)->orderBy('formated_date', 'asc')->get();
        // $name = shifts::where('user_id', $id)->get();
        // $officername = $name -> officer_name;
        $name = DB::table('users') -> select('*')->where('id', '=', $id) ->first();
        $officername = $name -> name;

        // $shiftscount = shifts::where('user_id', $id)->orderBy('formated_date', 'asc')->count();

        if($shifts->isEmpty()) {
            $shiftcountmessage = "No record found";
        } else {
            $shiftcountmessage = "";
        }
        return view('pages.usershiftshistory', compact('users', 'locations', 'shifts', 'officername', 'shiftcountmessage'));
    }

    /**
     * Show the form for creating a new resource.
     */
   

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
                    'formated_date' => $request->date,
                    'shift_status' => 'pending'
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


    public function edit($shifts)
    {
        $data=shifts::where('id',$shifts)->first();
        return $data;
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

    public function updateShift(Request $request)
    {
        //     $id =$request->shift_update_id;
        //     $inputDate = Carbon::parse($request->date); 
        //     $storedate = $inputDate->format('l, jS F, Y');
        //     $existData=shifts::where('officer_name',$request->officer_name)->where('date',$storedate)->where('location',$request->location);
        //     if(!$existData){
        //     // dd($existData);
        //     $data=shifts::find($id);
        //     $data -> officer_name  = $request->officer_name;
        //     $data -> location      = $request->location;
        //     $data -> date          = $storedate;
        //     $data -> formated_date = $request->date;
        //     $data->update();

        //     Alert::success('success', 'Updated Successfully!');
        //     return redirect()->back();
        //    } else {
        //     Alert::error('error', 'Error!');
        //     return redirect()->back();
        //    }

        $inputDate = Carbon::parse($request->date); 
        $nowdate = Carbon::now();

        $user_id = User::select('id')->where('name', $request->officer_name)->first();

        $date = $inputDate->setTime(0, 0, 0);
        $todays = $nowdate->setTime(0, 0, 0);

        $storedate = $inputDate->format('l, jS F, Y');

        $existingShift = Shifts::where('location', $request->location)
                            ->where('date', $date)
                            ->count();

        $officerAtSameShift = Shifts::where('user_id', $user_id)
                                    ->where('date', $storedate)
                                    ->where('location', $request->location)
                                    ->count();

        $officerOfficer = Shifts::where('user_id', $user_id)
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
            $user = User::find($user_id);
                if ($user) {
                $staffname = $user->name;
                Shifts::find($request->shift_update_id)->update([
                    'user_id' => $user_id,
                    'officer_name' => $staffname,
                    'location' => $request->location,
                    'date' => $storedate,
                    'formated_date' => $request->date,
                    'shift_status' => 'pending'
                ]);

                Alert::success('Success', 'Schedule updated Successfully!');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Invalid Officer Selected');
                return redirect()->back();
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       $id=$request ->shift_del_id;
       $data=shifts::find($id);
       $data->delete();
       return redirect()->back()->with('succes',"Deleted succesfully.");
    }
}
