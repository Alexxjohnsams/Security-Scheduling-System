<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Locations;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::whereNotIn('role', ['admin'])->get();
        $newusers = DB::table('users')
            ->select('*')
            ->where('role', '=', 'user')
            ->orderBy('created_at', 'desc')
            ->get();
            Alert::success('Success', 'You are Logged in!');
        return view('home', compact('users'));

        
    }
}
