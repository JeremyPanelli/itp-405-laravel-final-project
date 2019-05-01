@extends('layout')

@section('title', 'Profile')

@section('main')
<center>
  <h1>Profile</h1>
  <h7>Add stocks that you wish to track to your profile</h7>
  <div>
    <center>
      <table class="table">
          <tr>
              <th>Your Stocks</th>
          </tr>
          @forelse($stocks as $stock)
              <tr>
                  <td>
                      <a href="/stocks/{{$stock->stock}}">{{$stock->stock}}</a>
                  </td>
                  <td>
                    <form action="/stocks/{{$stock->stock}}/search" method=get>
                      @csrf
                      <input type="submit" value="Search within this Stock" class="btn btn-primary" >
                    </form>
                  </td>
                  <td>
                    <form action="/profile/{{$stock->stock}}" method=get>
                      @csrf
                      <input type="submit" value="Delete Stock From Profile" class="btn btn-primary" >
                    </form>
                  </td>
              </tr>
          @empty
              <tr>
                  <td colspan="4">No stocks found in your profile. Click "explore" to find stocks!</td>
              </tr>
          @endforelse
      </table>
    </div>
  </center>
</center>

@endsection
