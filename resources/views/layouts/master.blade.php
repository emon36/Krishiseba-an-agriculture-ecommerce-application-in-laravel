<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  <!--<base href="{{ URL::asset ('/') }}" target="_blank">-->
  <link rel="stylesheet" href="{{url ('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url ('css/style.css')}}">
  <link rel="stylesheet" href="{{url ('css/f.css')}}">

  <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">

 
  </head>
  <body>
    <div class="warpper">

      <!--Navigation-->
      @include('partials.nav')      
  
    
    
  
    @yield('content')

              




  </div>

@include('partials.scripts')
@yield('scripts')
  </body>
    @include('partials.footer')
</html>