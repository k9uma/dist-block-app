<?php

namespace App\Http\Controllers;

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
