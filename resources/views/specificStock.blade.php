@extends('layout')

@section('title', $id)

@section('main')
<center>
  <h5>{{$id}}</h5>
</center>
<div class="container col-6">
  <table class="table">
  @forelse($Date as $date)
      <tr>
          <td>
              {{$date->Date}}
          </td>
          <td>
              {{$date->Open}}
          </td>
          <td>
              {{$date->High}}
          </td>
          <td>
              {{$date->Low}}
          </td>
          <td>
              {{$date->Close}}
          </td>
          <td>
              {{$date->Volume}}
          </td>
      </tr>
  @empty
      <tr>
          <td colspan="4">No Data Found</td>
      </tr>
  @endforelse
</table>

@endsection
