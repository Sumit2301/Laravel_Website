<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DownloadBrochure;
use Illuminate\Http\Request;
use DB;
use Session;

class DownloadBrochureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloadbrochures = DownloadBrochure::get();
        return view('admin.downloadbrochures.index',compact('downloadbrochures'));
    }

    public function updateStatus($id,$status)
    {
        $inputs = array(
            'status'=>$status
        );

        DB::table("download_brochures")->where('id',$id)->update($inputs);
        return back()->with('success','Updated Successfully.');
    }

    public function remark_process(Request $request)
    {
        $id = $request->record_id;

        $inputs = array(
            'status'=>$request->status,
            'remark'=>$request->remark,
            'remark_date'=>$request->remark_date
        );

        DB::table("download_brochures")->where('id',$id)->update($inputs);

        Session::flash('success', "Status Updated Successfully.");

        return response()->json(['status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseInterest  $courseInterest
     * @return \Illuminate\Http\Response
     */
    public function show(CourseInterest $courseInterest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseInterest  $courseInterest
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseInterest $courseInterest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseInterest  $courseInterest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseInterest $courseInterest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseInterest  $courseInterest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseInterest $courseInterest)
    {
        //
    }
}
