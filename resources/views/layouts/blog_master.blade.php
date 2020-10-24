<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  <!--<base href="{{ URL::asset ('/') }}" target="_blank">-->
  <link rel="stylesheet" href="{{url ('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url ('css/style.css')}}">

  <link href="{{url('css/blog-post.css')}}" rel="stylesheet">
  
  </head>
  <body>
    <div class="warpper">

      <!--Navigation-->
      @include('partials.nav')      
  
    
    
  
    @yield('content')

          @include('partials.footer')      




  </div>

@include('partials.scripts')
@yield('scripts')
  </body>
</html>