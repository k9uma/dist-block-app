<?php

namespace App\Http\Controllers;

use App\Fault;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $applications = DB::table('customer_faults')
            ->leftJoin('users','customer_faults.user_id','=','users.id')
            ->leftJoin('users as technician','customer_faults.assigned_to','=','technician.id')
            ->select('customer_faults.*','users.name','technician.name as technician','technician.id as assigned_to')
            ->where('user_id',Auth::User()->id)
            ->get();
        return view('faults.index',compact('applications'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        //
        $applications = DB::table('customer_faults')
            ->leftJoin('users','customer_faults.user_id','=','users.id')
            ->leftJoin('users as technician','customer_faults.assigned_to','=','technician.id')
            ->select('customer_faults.*','users.name','technician.name as technician','technician.id as assigned_to')
            ->get();
        return view('faults.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('faults.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'description' => 'required',
        ]);

        $point = new Fault();
        $point->description = $request->input('description');
        $point->fault_id = 'Fault-'.str_random(10);
        $point->created_at = Carbon::now();
        $point->user_id = Auth::User()->id;
        $point->save();

        return redirect()->back()->with('success','Fault Recorded, Your Ticket ID is '.$point->fault_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
