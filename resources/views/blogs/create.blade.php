
@extends('layouts.app')

@section('content')
    <div class="pr-md-5">
<form action="{{route('store_blog_path')}}" method="post" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
        <label for="title">Title</label>

        <input type="text" name="title" required>


    </div>

    <div class="form-group">
        <label for="title">Content</label>
        <textarea name="contents" rows="10" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
       <button type="submit" class="btn btn-outline-primary"> Add Blog Posts

       </button>
    </div>

</form>
    </div>
    @endsection