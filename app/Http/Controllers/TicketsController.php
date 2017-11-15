<?php

namespace App\Http\Controllers;

use App\DPApplication;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $applications = DB::table('dp_applications')
            ->leftJoin('users','dp_applications.client_id','=','users.id')
            ->select('dp_applications.*','users.name')
            ->where('assigned_to',Auth::User()->id)
            ->get();
        return view('tickets.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        //
        $applications = DB::table('dp_applications')
            ->leftJoin('users','dp_applications.client_id','=','users.id')
            ->leftJoin('users as technician','dp_applications.assigned_to','=','technician.id')
            ->select('dp_applications.*','users.name','technician.name as technician','technician.id as assigned_to')
            ->get();
        $technicians = DB::table('users')
            ->leftJoin('role_user','users.id','=','role_user.user_id')
            ->leftJoin('roles','role_user.role_id','=','roles.id')
            ->select('users.name','users.id')
            ->where('roles.name','LIKE','%technician%')
            ->get();
        return view('tickets.assign_ticket',compact('applications','technicians'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request, $id)
    {
        //
        $this->validate($request, [
            'assigned_to' => 'required'
        ]);

        $role = DPApplication::find($id);
        $role->assigned_to = $request->input('assigned_to');
        $role->save();

        return redirect()->back()
            ->with('success','Technician successfully assigned to the application');
    }
}
