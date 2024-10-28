<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $blogs = Blog::get();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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

        $blog_image = $this->uploadimage($request,"blog","blog");

        $inputs['image'] = $blog_image;

        $thumbnail = $this->uploadimage($request,"blog","thumbnail");

        $inputs['thumbnail'] = $thumbnail;
        
        $inputs['slug'] = Str::slug($request->slug);
        $inputs['content'] = $request->description;

        Blog::create($inputs);

        return back()->with('success','Blog Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'=>'required'
        ]);

        $inputs = $request->all();
        
        //dd($inputs);exit;

        $blog_image = $this->uploadimage($request,"blog","blog");

        if ($blog_image) {
            $inputs['image'] = $blog_image;
        }

        $thumbnail = $this->uploadimage($request,"blog","thumbnail");
        if ($thumbnail) {
            $inputs['thumbnail'] = $thumbnail;
        }
        
        $inputs['slug'] = Str::slug($request->slug);
        $inputs['content'] = $request->description;

        $blog->update($inputs);

        return back()->with('success','Blog Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
       $blog->delete();
       return back()->with('Blog Deleted Successfully.');
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
