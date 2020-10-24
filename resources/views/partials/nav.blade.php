<nav class="navbar navbar-light bg-light navbar-expand-md">
        <div class="container-fluid">

          <a class="navbar-brand" href="{{ route('index')}}">কৃষিসেবা</a>


          <div class="navbar-toolbar d-flex align-items-center order-lg-3">
            <a class="nav-link" href="{{route('carts')}}">
                    <button class="btn btn-success fa fa-shopping-bag">
                    
                    <span class="badge badge-warning " id="totalItems">
                      {{ App\Cart::totalItems() }}
                    </span>
                  </button>
                  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
          </div>
            <div class="collapse navbar-collapse mr-auto order-lg-2" id="navbarCollapse">
              <ul class="navbar-nav ml-auto" >

                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('index')}}">মূলপাতা</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('knowledge_bank')}}">কৃষি তথ্য</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('products')}}">কৃষি উপকরন</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('helpline') }}">বিশেষজ্ঞের সেবা</a>
                  </li>
              </ul>


              

              <ul class="navbar-nav ml-auto">

                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('লগইন') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('রেজিস্টার') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('লগআউট') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
              </ul>


            </div>
          </div>
    </nav>
