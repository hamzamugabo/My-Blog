
@extends('layouts.app')

@section('content')
    <div class="pr-md-5">

        <form action="" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Comment</label>
                <textarea name="comment" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary"> Add Comment

                </button>
            </div>
        </form>

    </div>
@endsection