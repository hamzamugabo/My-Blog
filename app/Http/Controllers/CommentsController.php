<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Blog;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function index(Comment $blog_id)
    {
        $comments = Comment::find( $blog_id);

        return view('blogs.index_comment',['comments'=>$comments]);


    }


    public function create_comment(){

        return view('blogs.create_comment');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_comment(Request $request){

        $comments = new Comment();
        $comments->comment=$request->comment;
        $comments->blog_id=blog()->id;
        $comments->save();

        return redirect()->route('comments_path');

    }



}
