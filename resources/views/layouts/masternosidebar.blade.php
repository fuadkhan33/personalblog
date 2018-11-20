<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blogery</title>
        @include('modules.js')
        @include('modules.styles')
    </head>
    <body>

      <!----will be using this later
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            ---->
        <div class="row justify-content-center">
          <div class="col-md-11">
            <div class="row">
              <div class="col-md-12">
                @include('modules.navbar')
              </div>
            </div>
              <div class="row">
                <div class="col-md-12">
                  {{--Changeable yeild Page Section--}}
                  @yield('content')

                </div>
              </div>

            </div>




          </div>
        <div class="container">

              {{--Footer Section--}}
              @include('modules.footer')
        </div>
    </body>
</html>
