<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Blog;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //

    public function index_comment($blog_id){
        $comment = Comment::all();


        return view('blogs.index', ['comments' => $comment]);
    }
    public function create_comment(){

        return view('blogs.index');
    }
    public function store_comment(Blog $blog){

        $comment=Comment::create([
            'comment'=> \request('comment'),
            'blog_id'=>$blog->id,
        ]);

        dd($comment);

        return redirect()->route('blogs_path');

    }



}
