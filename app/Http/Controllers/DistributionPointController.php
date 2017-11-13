<?php

namespace App\Http\Controllers;

use App\DistributionPoint;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DistributionPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $points = DB::table('dist_points')->select('*')->get();
        return view('dist_points.index',compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dist_points.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store the Distribution Block

        $this->validate($request, [
            'street' => 'required|unique:roles,name',
            'city' => 'required',
            'description' => 'required',
            'dpNo' => 'required',
            'dpPairNo' => 'required',
            'code' => 'required',
        ]);

        $point = new DistributionPoint();
        $point->street = $request->input('street');
        $point->city = $request->input('city');
        $point->code = $request->input('code');
        $point->description = $request->input('description');
        $point->dpPairNo = $request->input('dpPairNo');
        $point->dpNo = $request->input('dpNo');
        $point->distributionSide = $request->input('distributionSide');
        $point->exchangeSide = $request->input('exchangeSide');
        $point->cabinetNo = $request->input('cabinetNo');
        $point->mdfPair = $request->input('mdfPair');
        $point->mdfBar = $request->input('mdfBar');
        $point->user_id = Auth::User()->id;
        $point->save();

        return redirect()->back()->with('success','Distribution Block Created Successfully');
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
        $distributionPoint = DistributionPoint::find($id);

        return view('dist_points.show',compact('distributionPoint'));
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
        $distributionPoint = DistributionPoint::find($id);

        return view('dist_points.edit',compact('distributionPoint'));
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
        $this->validate($request, [
            'street' => 'required|unique:roles,name',
            'city' => 'required',
            'description' => 'required',
            'dpNo' => 'required',
            'dpPairNo' => 'required',
            'code' => 'required',
        ]);

        $point = DistributionPoint::find($id);
        $point->street = $request->input('street');
        $point->city = $request->input('city');
        $point->code = $request->input('code');
        $point->description = $request->input('description');
        $point->dpPairNo = $request->input('dpPairNo');
        $point->dpNo = $request->input('dpNo');
        $point->distributionSide = $request->input('distributionSide');
        $point->exchangeSide = $request->input('exchangeSide');
        $point->cabinetNo = $request->input('cabinetNo');
        $point->mdfPair = $request->input('mdfPair');
        $point->mdfBar = $request->input('mdfBar');
        $point->user_id = Auth::User()->id;
        $point->save();

        return redirect()->back()->with('success','Distribution Block Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete a DP
        DB::table("dist_points")->where('id',$id)->delete();
        return redirect()->route('dp.index')
            ->with('success','Distribution Block deleted successfully');
    }
}
