<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    //

    public function index(){
        $blogs = Blog::all();


        return view('blogs.index', ['blogs' => $blogs]);
    }



    public function create(){

        return view('blogs.create');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        return view('blogs.show', ['blog' => $blog]);
    }



    public function edit($id){
        $blog = Blog::find($id);

        return view('blogs.edit', ['blog'=>$blog]);
    }


    public function update(Request $request,$id){
        $blog= Blog::find($id);
        $blog->title=$request->title;
        $blog->contents=$request->contents;

        $blog->update();
        return redirect()->route('blogs_path',['blog'=>$blog]);

    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'contents' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

       

        $blog = new Blog();

        $path = Storage::putFile('public',$request->file('image'));
        $url=Storage::url($path);
        $blog->image=$url;
        $blog->title=$request->title;
        $blog->contents=$request->contents;

        $blog->save();

        return redirect()->route('blogs_path');

    }


    public function delete($id){
        $blog = Blog::find($id);

        $blog->delete();

        return redirect()->route('blogs_path');
    }
}
