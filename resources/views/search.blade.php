@extends('layout')

@section('title', $id)

@section('main')
<center>
  <h1>{{$id}}</h1>
  <form action = "/stocks/{{$id}}/search/get" method = "get" style="margin-top: 30px">
    <p>
      <label>Earliest Date</label>
      <input type = "date" name = "date" >
      @error('date')
        <small>
          <div class="alert alert-danger">{{ $message }}</div>
        </small>
      @enderror
    </p>

    <p>
      <label>Min High</label>
      <input type = "text" name = "minHigh" >
      @error('minHigh')
        <small>
          <div class="alert alert-danger">{{ $message }}</div>
        </small>
      @enderror
    </p>
    <p>
      <label>Max High</label>
      <input type = "text" name = "maxHigh" >
      @error('maxHigh')
        <small>
          <div class="alert alert-danger">{{ $message }}</div>
        </small>
      @enderror
    </p>
    <p>
      <label>Min Low</label>
      <input type = "text" name = "minLow" >
      @error('minLow')
        <small>
          <div class="alert alert-danger">{{ $message }}</div>
        </small>
      @enderror
    </p>
    <p>
      <label>Max Low</label>
      <input type = "text" name = "maxLow" >
      @error('maxLow')
        <small>
          <div class="alert alert-danger">{{ $message }}</div>
        </small>
      @enderror
    </p>
    <p>
      <label>Min Close</label>
      <input type = "text" name = "minClose" >
      @error('minClose')
        <small>
          <div class="alert alert-danger">{{ $message }}</div>
        </small>
      @enderror
    </p>
    <p>
      <label>Max Close</label>
      <input type = "text" name = "maxClose" >
      @error('maxClose')
        <small>
          <div class="alert alert-danger">{{ $message }}</div>
        </small>
      @enderror
    </p>
    <p>
      <label>Min Volume</label>
      <input type = "text" name = "minVol" >
      @error('minVol')
          <small>
            <div class="alert alert-danger">{{ $message }}</div>
          </small>
      @enderror
    </p>
    <p>
      <label>Max Volume</label>
      <input type = "text" name = "maxVol" >
      @error('maxVol')
        <small>
          <div class="alert alert-danger">{{ $message }}</div>
        </small>
      @enderror
    </p>
    <button type="submit">Submit</button>
  </form>
</center>

@endsection
