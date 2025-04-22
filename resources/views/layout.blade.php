<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Inventory')</title>
    @vite('resources/css/app.css')
  </head>
  <body>
  @vite('resources/css/app.css')
    @include('include.header')
    @yield('content')
    
  </body>
</html>