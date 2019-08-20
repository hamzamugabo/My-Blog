<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

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
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>

</head>
<body>


<h1 style="text-align: center;">Create New Devices</h1>

<div class="container" style="align-content: center;background-color: cornsilk;">
    <div style="margin-left: 40%;">

    <form method="POST" action="{{ url('/devicesaction') }}">

        {{ csrf_field() }}

        <div style="margin-left: 20px;" >
            <label >Device Name</label><br>
            <input type="text" name="name" placeholder="Device Name" style="width: 30%;" required>

        </div>
        <div style="margin-left: 20px;">
            <label >Device Description</label><br>
            <textarea name="description" placeholder="Device Description" style="width: 30%;" required></textarea>

        </div>
        <div>

            <p style="margin-left: 40px;"><input type="submit" value="Make Device"></p>

        </div>

    </form>
    </div>

</div>
</body>
</html>