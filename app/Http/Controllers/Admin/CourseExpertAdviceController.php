<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\CourseExpertAdvice;
use Illuminate\Http\Request;
use DB;
use Session;

class CourseExpertAdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseexpertadvices = CourseExpertAdvice::get();
        return view('admin.courseexpertadvices.index',compact('courseexpertadvices'));
    }

    public function updateStatus($id,$status)
    {
        $inputs = array(
            'status'=>$status
        );

        DB::table("course_expert_advice")->where('id',$id)->update($inputs);
        return back()->with('success','Status Updated Successfully.');
    }

    public function remark_process(Request $request)
    {
        $id = $request->record_id;

        $inputs = array(
            'status'=>$request->status,
            'remark'=>$request->remark,
            'remark_date'=>$request->remark_date
        );

        DB::table("course_expert_advice")->where('id',$id)->update($inputs);

        Session::flash('success', "Updated Successfully.");

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
     * @param  \App\CourseExpertAdvice  $courseExpertAdvice
     * @return \Illuminate\Http\Response
     */
    public function show(CourseExpertAdvice $courseExpertAdvice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseExpertAdvice  $courseExpertAdvice
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseExpertAdvice $courseExpertAdvice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseExpertAdvice  $courseExpertAdvice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseExpertAdvice $courseExpertAdvice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseExpertAdvice  $courseExpertAdvice
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseExpertAdvice $courseExpertAdvice)
    {
        //
    }
}
