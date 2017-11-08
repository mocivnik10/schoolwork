@if (Route::has('login'))
    <div class="navbar-menu">
      <div class="navbar-links text-right links">
        <a href="/">Home</a>
        <a href="/rate">Rate</a>
          @auth
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <a href="#">{{ Auth::user()->name }} <span class="caret"></span></a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          @else
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
          @endauth
      </div>
    </div>
@endif

<div class="mt mb"></div>
