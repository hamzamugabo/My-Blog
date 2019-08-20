<!DOCTYPE html>
<html>
<head>
    <title>loginform</title>

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


<h1 style="text-align: center;">Create New Customer</h1>

<div class="container" style="align-content: center;background-color: cornsilk;">
    <div style="margin-left: 40%;">

        <form method="POST" action="{{ url('/devicesaction') }}">

            {{ csrf_field() }}

            <div style="margin-left: 20px;" >
                <label >customer name</label><br>
                <input type="text" name="name" placeholder="customer name" style="width: 30%;" required>
            </div>

            <div style="margin-left: 20px;" >
                <label >customer phoneNumber</label><br>
                <input type="text" name="phone" placeholder="customer phoneNumber" style="width: 30%;" required>
            </div>
            <div style="margin-left: 20px;" >
                <label >customer email</label><br>
                <input type="email" name="email" placeholder="customer email" style="width: 30%;" required>

            </div>
            <div>

                <p style="margin-left: 40px;"><input type="submit" value="Register"></p>

            </div>

        </form>
    </div>

</div>
</body>
</html>