@extends('layout')

@section('title', 'Home Page')

@section('main')
<center>
  <h1>Welcome to Stock-Data</h1>
  @if(Auth::check())
    <p style="margin-bottom: 30px">Check your stocks or explore the stocks in our database</p>
    <form action="/profile" method=get>
      <input type="submit" value="Profile" class="btn btn-primary"  style="margin-bottom: 30px">
    </form>
    <form action="/stocks" method=get>
      <input type="submit" value="Stocks Explorer" class="btn btn-primary"  style="margin-bottom: 30px">
    </form>
  @else
    <p style="margin-bottom: 30px">Login or signup to get access to thousands of historical stock records</p>
    <form action="/login" method=get>
      <input type="submit" value="Login" class="btn btn-primary"  style="margin-bottom: 30px">
    </form>

    <form action="/signup" method=get>
      <input type="submit" value="Sign Up" class="btn btn-primary">
    </form>
  @endif
</center>


@endsection
