<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title','') | Apps</title>
   @include('admin.partials.head')
</head>
<body id="page-top">
  <div id="wrapper">
    @include('admin.partials.sidebar')
    <div id="content-wrapper">
      @yield('content')

      @include('admin.partials.footer')
    </div>
  </div>

</body>
</html>