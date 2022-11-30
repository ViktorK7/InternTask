<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Store</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    {{View::make('header')}}
    @yield('content')
    @yield('footer')
</body>

<style>
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    figure {
        background-color: #0e0e0e;
        background-position: center center;
        background-size: cover;
        display: inline-block;
        width: 49%;
        height: 400px;

    }
    footer {
        text-align: center;
        clear: both;
        position: relative;
        height: 200px;
        margin-top: -200px;
    }
</style>
</html>
