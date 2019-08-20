<!DOCTYPE html>
<html>
<head>

</head>
<style>
    div{
        margin-left: 10%;
        margin-right: 10%;

    }
    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: blue;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

</style>
<body>


<div style="background-color: #e9ecef;">


    <div>
        <h1>customer details</h1>
        @foreach ($customers as $customer)

            {{--<li> {{ $customer->request('name')}}  </li>--}}
            <li> {{ $customer->phone}}  </li>
            {{--<li> {{ $customer->email}}  </li>--}}

        @endforeach

    </div>

    <br>
    <br>
    <div>

        <a href="{{url('/devices/create')}}"><input type="submit" value="Add Device"> </a>
    </div>

</div>

</body>
</html>