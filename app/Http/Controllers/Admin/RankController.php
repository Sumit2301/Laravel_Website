<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Course;
use App\Rranktype;
use Illuminate\Support\Str;

class RankController extends Controller
{
   public function __construct(){
   	$this->middleware('auth');
   }

    public function index(){

       $rank_details = Rranktype::all();
     return view('admin/ranktype/ranklist',compact('rank_details'));

    	
   }  

   public function store(Request $request){

   	$data = array(
   		'rank_type' => $request->rank_type,
      'description' => $request->description,
      'slug' => Str::slug($request->rank_type)
   	);

    $image = $this->uploadimage($request,"rank","image");

    $data['image'] = $image;

   	$add_type = Rranktype::create($data);
   	return redirect()->route('admin.ranktypes.index')->with('success','Rank Type Added Successfully!');
   }

   public function create(Request $request){
      return view('admin/ranktype/ranktype');
   }



   public function show($id){

    $rank_details = Rranktype::where('rank_id',$id)->first();
   	return view('admin/ranktype/ranktype',['rank_details'=>$rank_details]);
   }



   public function edit($id){

    $rank_details = Rranktype::where('rank_id',$id)->first();
   	return view('admin/ranktype/ranktype',['rank_details'=>$rank_details]);
   }
   /*public function ranklist(){
   	 $rank_details = Rranktype::all();
   	 return view('admin/ranktype/ranklist',compact('rank_details'));
   }*/

   public function update(Request $request, $id){
   	    $data = array(
   	    	'rank_type' => $request->rank_type,
          'description' => $request->description,
          'slug' => Str::slug($request->rank_type)
   	    );

        $image = $this->uploadimage($request,"rank","image");

        if ($image) {
          $data['image'] = $image;
        }

    	$update_ranktype = Rranktype::where('rank_id',$id)->update($data);
    	return redirect()->route('admin.ranktypes.edit',$id)->with('success','Rank Type Update Successfully!');
   }

   public function destroy($id){
   	Rranktype::where('rank_id',$id)->delete('ranktype');
   	return redirect()->route('admin.ranktypes.index')->with('success','Rank Type Delete Successfully!');
   }

    private function uploadimage($request,$folder,$file){
        $destinationPath = 'uploads/'.$folder;
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
