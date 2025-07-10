<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        body{
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield("content")
    </div>
</body>
</html>