<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="/">Logo</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="{{ Request::is('/') ? "active" : "" }}">
      <a class="nav-link" href="/">Home</a>
    </li>
    <li class="{{ Request::is('blog') ? "active" : "" }}">
      <a class="nav-link" href="/blog">Blog</a>
    </li>
    <li class="{{ Request::is('about') ? "active" : "" }}">
      <a class="nav-link" href="/about">About</a>
    </li>
    <li class="{{ Request::is('contact') ? "active" : "" }}">
      <a class="nav-link" href="/contact">Contact</a>
    </li>
    <li class="{{ Request::is('advertise') ? "active" : "" }}">
      <a class="nav-link" href="/advertise">Advertise</a>
    </li>
  </ul>

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
    
    <ul class="nav navbar-nav">
    <li class="nav-item dropdown navbar-right">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Logout</a>
      </div>
    </li>
    </ul>
</nav>