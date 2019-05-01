<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
  <div class = "container-fluid">
  <ul class = "nav">
    <li class = "nav-item">
      <a href = "/">Welcome</a>
    </li>
    @if(Auth::check())
      <li class = "nav-item">
        <a href = "/profile"> Profile</a>
      </li>
      <li class = "nav-item">
        <a href = "/stocks"> Explore Stocks</a>
      </li>
      <li class = "nav-item">
        <a href = "/logout"> Logout</a>
      </li>
    @else
      <li class = "nav-item">
        <a href = "/login">Login </a>
      </li>
      <li class = "nav-item">
        <a href = "/signup"> Sign Up </a>
      </li>
    @endif
  </ul>
</div>
    @yield('main')
</body>
</html>
