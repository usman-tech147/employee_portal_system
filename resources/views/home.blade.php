<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <style>
        .title{
            color:#000000;
        }
        .card-body {
            text-align: center;
        }
        .card-body a{
            font-size: 20px;
            text-decoration: none;
        }
        a:hover {
            background: #f4b0af;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini">

<div class="container" style="margin-top: 100px">
    <div class="row mb-2">
        <div class="card-deck images_card">
            <div style="padding-right: 110px">
                <div class="card" style="border: none">
                    <img class="card-img-top" src="{{URL::asset('/User_Images/4.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <a href="{{route('login',['id' => 1])}}" class="badge">
                            <p class="title" style="margin-bottom: 0px">Dean</p>
                        </a>
                    </div>
                </div>
            </div>
            <div style="padding-right: 110px">
                <div class="card" style="border: none">
                    <img class="card-img-top" src="{{URL::asset('/User_Images/6.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <a href="{{route('login',['id' => 1])}}" class="badge">
                            <p class="title" style="margin-bottom: 0px">Teacher</p>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="card" style="border: none">
                    <img class="card-img-top" src="{{URL::asset('/User_Images/8.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <a href="{{route('login',['id' => 1])}}" class="badge">
                            <p class="title" style="margin-bottom: 8px">Hr</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.row -->
</div>

<script src="{{asset('js/app.js')}}"></script>
@yield('js')
</body>
</html>

