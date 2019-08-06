<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    <li class="nav-item">
    <a class="{{Request::is('/') ? "nav-link active":"nav-link"}}" href="{{ asset('/')}}">Home</a>
  </li>
  <li class="nav-item">
    <a class="{{Request::is('blog') ? "nav-link active":"nav-link"}}" href="{{ asset('/blog')}}">Blog</a>
  </li>
  
  <li class="nav-item">
   <a class="{{Request::is('about') ? "nav-link active":"nav-link"}}" href="{{ asset('/about')}}">About</a> 
  </li>
  <li class="nav-item">
    <a class="{{Request::is('contact') ? "nav-link active":"nav-link"}}" href="{{ asset('/contact')}}">Contacts</a>
  </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a class="dropdown-item" href="{{route('posts.index')}}">Posts</a></li>
                                  <li><a class="dropdown-item" href="{{route('categories.index')}}">Categories</a></li>
                                  <li><a class="dropdown-item" href="{{route('tags.index')}}">Tags</a></li>
                                  <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
  
          
