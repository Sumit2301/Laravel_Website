<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $staticpages = StaticPage::get();
        return view('admin.staticpages.index',compact('staticpages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staticpages.create');
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
            'title'=>'required'
        ]);

        $inputs = $request->all();
        
        //$inputs['slug'] = Str::slug($request->slug);
        $inputs['content'] = $request->description;

        StaticPage::create($inputs);

        return back()->with('success','Static Page Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaticPage  $article
     * @return \Illuminate\Http\Response
     */
    public function show(StaticPage $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaticPage  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = StaticPage::findOrFail($id);
        return view('admin.staticpages.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaticPage  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = StaticPage::findOrFail($id);

        $request->validate([
            'title'=>'required'
        ]);

        $inputs = $request->all();
        
        //$inputs['slug'] = Str::slug($request->slug);
        $inputs['content'] = $request->description;

        $article->update($inputs);

        return back()->with('success','Static Page Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaticPage  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaticPage $article)
    {
       $article->delete();
       return back()->with('Static Page Deleted Successfully.');
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
