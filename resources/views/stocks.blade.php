@extends('layout')

@section('title', 'Stocks')

@section('main')
<center>
  <h1>Stocks</h1>
  <h7 style="margin-bottom: 30px">Explore and search for different stocks. Click on a stock to take you to its historical data</h7>
  <form action = "/stocks" method = "get" value = {{$search}} style="margin-top: 30px">
    <input type = "text" name = "search" >
    <button type = "submit">Search</button>
  </form>
</center>
<div class="container col-6">
        <table class="table">
            <tr>
                <th>Stocks</th>
            </tr>
            @forelse($stocks as $stock)
                <tr>
                    <td>
                        <a href="/stocks/{{$stock->name}}">{{$stock->name}}</a>
                    </td>
                    <td>
                      <form action="/stocks/{{$stock->name}}/{{$user}}" method=post>
                        @csrf
                        <input type="submit" value="Add Stock To Profile" class="btn btn-primary" >
                      </form>
                    </td>
                    <td>
                      <form action="/stocks/{{$stock->name}}/search" method=get>
                        @csrf
                        <input type="submit" value="Search within this Stock" class="btn btn-primary" >
                      </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No stocks found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
