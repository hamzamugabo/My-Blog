<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    public function index(){
        $blogs = Blog::all();

        $comments = Blog::find(1)->comments;

        return view('blogs.index', ['blogs' => $blogs,'comments'=>$comments]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function create_comment()
    {
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

    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('blogs.edit', ['blog'=>$blog]);
    }

    public function update(Request $request,$id)
    {
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
        $path = Storage::putFile('public',$request->file('image'));
        $url=Storage::url($path);
        $blog = Blog::create(['image'=>$url,
        'title'=>$request->title,
        'contents'=>$request->contents,
        ]);
        $blog->save();
//        return response([],'201');

//        response($blog,'201');

        return redirect()->route('blogs_path','','302');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $comments = Blog::find(1)->comments;
        $blog->delete();
        $comments->delete();

        return redirect()->route('blogs_path');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_comment()
    {
//       $comment = new Comment();
//       $comment->comment=$request->comment;
//       $comment->blog_id=$request->hasMany('blog_id');
//       $comment->save();

        $blog = Blog::find(1);
        $comment = Comment::find(1);
//        $comment->blog->id;
//        dd($blog);



        $commentToAdd = new Comment();
        $commentToAdd->comment=\request()->comment;
        $blog->comments()->save($commentToAdd);
//        return redirect()->route('blog_path');
        return view('blogs.show', ['blog' => $blog]);
    }

}
