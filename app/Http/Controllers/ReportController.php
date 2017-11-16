<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function index()
    {
        $registeredCustomers = DB::table('users')
            ->leftJoin('role_user','users.id','=','role_user.user_id')
            ->leftJoin('roles','role_user.role_id','=','roles.id')
            ->select('users.*')
            ->where('roles.name','customer')
            ->count();

        $staff = DB::table('users')
            ->leftJoin('role_user','users.id','=','role_user.user_id')
            ->leftJoin('roles','role_user.role_id','=','roles.id')
            ->select('users.*')
            ->where('roles.name','!=','customer')
            ->count();

        $pendingFaults = DB::table('customer_faults')
            ->where('status','!=','Resolution Updated')
            ->count();

        $resolvedFaults = DB::table('customer_faults')
            ->where('status','!=','Resolution Updated')
            ->count();

        $faults = DB::table('customer_faults')
            ->count();
        return view('reports.index',compact('resolvedFaults','registeredCustomers','pendingFaults','faults','staff'));
    }
}
