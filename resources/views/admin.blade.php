<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>TrasCaminhoneiro - Dashboard</title>
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div id="app" class="wrapper">
            <top-nav></top-nav>
            <side-bar></side-bar>
            <div class="content-wrapper">
                <router-view></router-view>
            </div>
        </div>
        <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
