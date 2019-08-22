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

    public function index(Comment $blog_id){
        $blogs = Blog::all();
//        dd($blogs);

        $comments = Blog::find(1)->comments;


        return view('blogs.index', ['blogs' => $blogs,'comments'=>$comments]);
    }



    public function create(){

        return view('blogs.create');
    }
    public function create_comment(){

        return view('blogs.create_comment');
    }


    /**
     * @param $id
     * @param $blog_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $comments = Blog::find(1)->comments;

        return view('blogs.show', ['blog' => $blog,'comments'=>$comments]);
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
        $comments = Blog::find(1)->comments;

        $blog->delete();
        $comments->delete();

        return redirect()->route('blogs_path');
    }
    public function store_comment(Request $request){

       $comment = new Comment();
       $comment->comment=$request->comment;
       $comment->blog_id=$request->
       $comment->save();
        return redirect()->route('comments_path');

    }

}
