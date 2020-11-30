<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/bootstrap.css">`
        <link rel="stylesheet" href="/css/bootstrap.min.css">

        <script type="text/javascript" src="/js/bootstrap.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    </head>
    <body>
        <div class="body-container">
            <div class="body-wall">
                @yield('content')
            </div>
        </div>
    </body>
</html>
