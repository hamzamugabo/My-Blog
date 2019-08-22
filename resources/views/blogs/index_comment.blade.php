@extends('layouts.app')

@section('content')
    <div class="row">

        @foreach($comments as $comment)


            {{$comment->comment}}<br>


        @endforeach
        <div class="col-md-12">
            <br>
            <h3>{{$comment->comment}}</h3>


        </div>

    </div>
@endsection