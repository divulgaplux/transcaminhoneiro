<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>TrasCaminhoneiro</title>

        <link href="/css/app.css" rel="stylesheet">

        <!-- Fonts
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        -->

    </head>
    <body>
       <div id="app">
           <general-menu></general-menu>
           <router-view></router-view>
           <general-footer></general-footer>
       </div>
       <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>

       <script src="/js/app.js"></script>
    </body>
</html>
