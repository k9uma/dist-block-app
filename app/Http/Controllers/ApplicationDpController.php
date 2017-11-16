<?php

namespace App\Http\Controllers;

use App\DistributionPoint;
use App\DPApplication;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationDpController extends Controller
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
            ->leftJoin('users as technician','dp_applications.assigned_to','=','technician.id')
            ->select('dp_applications.*','users.name','technician.name as technician','technician.id as assigned_to')
            ->get();
        return view('applications.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('applications.create');
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
        //Store the Distribution Block

        $this->validate($request, [
            'description' => 'required',
            'service' => 'required',
        ]);

        $sketchMap = $request->input('sketchMap');

        $sketchMap_path = null;

        if($sketchMap != null) {
            $destinationPath = 'uploads/sketchMap/'.Auth::User()->id.'/'; // upload path
            $extension = $sketchMap->getClientOriginalExtension(); // getting image extension
            $fileName = Auth::User()->id.''.str_random(9).'.'.$extension; // renaming image
            $sketchMap->move($destinationPath, $fileName); // uploading file to given path
            $sketchMap_path = $destinationPath;
        }

        $point = new DPApplication();
        $point->service = $request->input('service');
        $point->sketchMap = $sketchMap_path;
        $point->description = $request->input('description');
        $point->applicationDate = Carbon::now();
        $point->client_id = Auth::User()->id;
        $point->save();

        return redirect()->back()->with('success','Application Made Successfully');
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
        $application = DB::table('dp_applications')
            ->leftJoin('users','dp_applications.client_id','=','users.id')
            ->leftJoin('dist_points','dp_applications.dist_block','=','dist_points.id')
            ->leftJoin('users as technician','dp_applications.assigned_to','=','technician.id')
            ->select('dp_applications.*','dist_points.code','dist_points.dpNo','dist_points.street','dist_points.availableSlots','dist_points.description as desc',
                'users.name','users.city','users.streetName','users.city','users.houseNumber','users.plotNumber','users.postalAddress','users.physicalAddress','users.province',
                'technician.name as technician','technician.id as assigned_to')
            ->where('dp_applications.id',$id)
            ->first();
        $blocks = DistributionPoint::all();
        return view('applications.show',compact('application','blocks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $this->validate($request, [
            'assigned_to' => 'required'
        ]);

        $dp = DistributionPoint::find($request->input('assigned_to'));
        if($dp->availableSlots > 0)
        {
            $role = DPApplication::find($id);
            $role->dist_block = $request->input('assigned_to');
            $role->status = 'DP Assigned to Application';
            $role->save();
            $availableSlots = $dp->availableSlots - 1;
            $dp->availableSlots = $availableSlots;
            $dp->save();
            return redirect()->back()
                ->with('success','DP assigned successfully');
        }else{
            return redirect()->back()
                ->with('warning','DP assignment unsuccessful, No available Slots');
        }

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
        $role = DPApplication::find($id);
        $role->assessment = $request->input('assessment');
        $role->status = 'Application Assessed Pending Conclusion';
        $role->save();

        return redirect()->back()
            ->with('success','DP Application Assessed Successfully');
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
