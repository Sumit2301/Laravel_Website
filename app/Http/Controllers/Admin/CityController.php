<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\City;
use App\State;
use Illuminate\Http\Request;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $states = State::get();

        $state_id = $request->get('state_id');
        if ($state_id) {
            $cities = City::where('state_code',$state_id)->get();
        }
        else {
            $cities = City::get();
        }
        return view('admin.cities.index',compact('cities','states','state_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::get();
        return view('admin.cities.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_name'=>'required',
            'slug'=>'required',
            'city_code'=>'required',
            'state_code'=>'required'
        ]);

        $inputs = array(
            'city_name'=>$request->city_name,
            'slug'=>$request->slug,
            'content'=>$request->content,
            'state_code'=>$request->state_code,
            'city_code'=>$request->city_code
        );

        City::insert($inputs);

        return back()->with('success','City Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = State::get();
        $city = City::findOrFail($id);
        return view('admin.cities.edit',compact('city','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $request->validate([
            'city_name'=>'required',
            'slug'=>'required',
            'city_code'=>'required',
            'state_code'=>'required'
        ]);

        $inputs = array(
            'city_name'=>$request->city_name,
            'slug'=>$request->slug,
            'content'=>$request->content,
            'state_code'=>$request->state_code,
            'city_code'=>$request->city_code
        );

        DB::table("cities")->where('id',$id)->update($inputs);

        return back()->with('success','City Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
       $city->delete();
       return back()->with('City Deleted Successfully.');
    }

    private function uploadimage($request,$file){
        $destinationPath = 'uploads/'.$file;
        $imgName='';
        //if($request->hasfile('logo')) 
        if($request->hasfile($file)) 
        { 
          $file = $request->file($file);
          $extension = $file->getClientOriginalExtension();
          $filename =time().rand(10,100).'.'.$extension;
          $file->move($destinationPath, $filename);
          $imgName = $filename;
        }
        return $imgName;
    }
}
