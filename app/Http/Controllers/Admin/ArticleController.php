<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $articles = Article::get();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
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

        $article_image = $this->uploadimage($request,"article","article");

        $inputs['image'] = $article_image;

        $thumbnail = $this->uploadimage($request,"article","thumbnail");

        $inputs['thumbnail'] = $thumbnail;
        
        $inputs['slug'] = Str::slug($request->slug);
        $inputs['content'] = $request->description;

        Article::create($inputs);

        return back()->with('success','MBA Course Blog Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title'=>'required'
        ]);

        $inputs = $request->all();

        $article_image = $this->uploadimage($request,"article","article");
        
        $inputs['slug'] = Str::slug($request->slug);
        $inputs['content'] = $request->description;

        if ($article_image) {
            $inputs['image'] = $article_image;
        }

        $thumbnail = $this->uploadimage($request,"article","thumbnail");
        if ($thumbnail) {
            $inputs['thumbnail'] = $thumbnail;
        }

        $article->update($inputs);

        return back()->with('success','MBA Course Blog Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
       $article->delete();
       return back()->with('Medical Course Blog Deleted Successfully.');
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
