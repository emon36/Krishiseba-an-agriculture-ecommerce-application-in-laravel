<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Krishiseba Admin</title>
  <link rel="stylesheet" href="{{asset('css/admin_style.css')}}" />
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>
  <link rel="shortcut icon" href="/images/favicon.png" />
  <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">
  



</head>

<body>

  <nav class="navbar navbar-light bg-light navbar-expand-md">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="flex-row d-flex">
      <a class="navbar-brand mb-1" href="{{ route('admin.index')}}">Krishiseba</a>
      <button type="button" class="hidden-md-up navbar-toggler" data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('admin.index')}}" >Dashboard <i class="fa fa-tachometer" aria-hidden="true"></i>
 <span class="sr-only">Home</span></a> 
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                  <a class="nav-link" href="#">
                      <form class="from-inline" action="{{ route('admin.logout') }}" enctype="multipart/from-data" method="POST">
                          @csrf

                          <input type="submit" value="Logout Now" class="btn btn-danger" name="">
                      </form>
                  </a>
              </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid" id="main" >

    <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-dark"  id="sidebar" role="navigation">
        <ul class="nav flex-column pl-1">
          <li class="nav-item">
            <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Products ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.products')}}">Manage Products</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.product.create')}}">Create Product</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">Product Categories ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu2" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories')}}">Manage Category</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.category.create')}}">Create Category</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#submenu3" data-toggle="collapse" data-target="#submenu3">Orders ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu3" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.orders')}}">Manage Orders</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#submenu4" data-toggle="collapse" data-target="#submenu4">Helpline Service ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu4" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.helplines')}}">Manage Helpline Services</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#submenu5" data-toggle="collapse" data-target="#submenu5">Posts ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu5" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.blogs')}}">Manage Post</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog.create')}}">Create Post</a></li>
            </ul>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="#submenu6" data-toggle="collapse" data-target="#submenu6">Post Categories ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu6" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog_categories')}}">Manage Post Category</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog_category.create')}}">Create Post Category</a></li>
            </ul>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="#submenu7" data-toggle="collapse" data-target="#submenu7">Manage Location ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu7" aria-expanded="false">

              <a class="nav-link" href="#submnu1" data-toggle="collapse" data-target="#submnu1"> Division ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submnu1" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.divisions')}}">Manage Division</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.division.create')}}">Create Division</a></li>
            </ul>

            <a class="nav-link" href="#submnu2" data-toggle="collapse" data-target="#submnu2"> District ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submnu2" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.districts')}}">Manage District</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.district.create')}}">Create District</a></li>
            </ul>

            <a class="nav-link" href="#submnu3" data-toggle="collapse" data-target="#submnu3"> Sub-District ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submnu3" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.sub_districts')}}">Manage Sub-District</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.sub_district.create')}}">Create Sub-District</a></li>
            </ul>

            <a class="nav-link" href="#submnu4" data-toggle="collapse" data-target="#submnu4"> Union ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submnu4" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.unions')}}">Manage Union</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.union.create')}}">Create Union</a></li>
            </ul>
            </ul>
          </li>
        </ul>
      </div>



        <!-- partial -->
        <div class="col-md-8  col-lg-10 main">

        @yield('content')

       

        

      </div>
        

         </div>

  </div>
        <!-- partial:partials/_footer.html -->
        <footer class="fixed-bottom">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="{{route('admin.index')}}">Krishiseba</a> &copy; 2020
            </span>
          </div>
        </footer>

   



   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script src="{{asset ('js/jquery-3.4.1.min.js')}}" charset="utf-8"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>

  <script src="https://kit.fontawesome.com/859681c33a.js" crossorigin="anonymous"></script>


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
} );

</script>

<script>
    $(document).ready(function() {
      $("[data-toggle=offcanvas]").click(function() {
        $(".row-offcanvas").toggleClass("active");
      });
    });
  </script>


</body>

</html>
