<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('post.all')}}">Blogery</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if(\Request::url()==route('post.all')){ echo "active";} ?>">
        <a class="nav-link"  href="{{route('post.all')}}">Home <span class="sr-only">(current)</span></a>
      </li>


      @guest
      <li class="nav-item <?php if(\Request::url()==route('about.us')){ echo "active";} ?>">
        <a class="nav-link"  href="{{route('about.us')}}">About Us <span class="sr-only">(current)</span></a>
      </li>
      @else
      <li class="nav-item <?php if(\Request::url()==route('user.post',Auth::User()->id) || \Request::Route()->getName()=='catagoryauth'){ echo "active";} ?>">
        <a class="nav-link " href="{{route('user.post',Auth::User()->id )}}">My Post <span class="sr-only">(current)</span></a>
      </li>
      @endguest
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Pannel
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('user.post.submitpage')}}">Submit Post</a>
        </div>
      </li>
      @endauth

      <form method="GET" action="{{route('post.search')}}" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </ul>

    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </li>
        @endguest
        @auth
          <li class="nav-item" >

          </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  @if(Auth::User()->image==null)
                  <img src="{{asset('usersimage/avatar.jpg')}}" class=" img-thumbnail rounded cus-thumbnail" alt="">  {{ Auth::user()->user_name }} <span class="caret"></span>
                  @else
                  <img src="{{asset(Auth::user()->image)}}" class=" img-thumbnail rounded cus-thumbnail" alt="">  {{ Auth::user()->user_name }} <span class="caret"></span>

                  @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('user.profile.edit') }}">
                        {{ __('Edit Profile') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth
    </ul>
  </div>
</nav>
