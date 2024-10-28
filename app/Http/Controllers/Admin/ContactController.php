<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Contact;
use Illuminate\Http\Request;
use DB;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::get();
        return view('admin.contacts.index',compact('contacts'));
    }

    public function updateStatus($id,$status)
    {
        $inputs = array(
            'status'=>$status
        );

        DB::table("contacts")->where('id',$id)->update($inputs);
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

        DB::table("contacts")->where('id',$id)->update($inputs);

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
     * @param  \App\Contact  $courseExpertAdvice
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $courseExpertAdvice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $courseExpertAdvice
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $courseExpertAdvice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $courseExpertAdvice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $courseExpertAdvice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $courseExpertAdvice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $courseExpertAdvice)
    {
        //
    }
}
