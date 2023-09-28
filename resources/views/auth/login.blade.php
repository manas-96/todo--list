@extends('components.template')
@section('title')
    Login- To Do 
@endsection

@section('content')
<h1 class="m-4 text-success text-center" style="font-family: cursive">LOGIN TO VIEW TODAY'S WORK</h1>
<div class="container col-6">
<form method="post" action="{{route('login')}}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username:</label>
      <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <small class="text-danger">@error('username')
        {{$message}}
      @enderror</small>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      <small class="text-danger">
        @error('password')
          {{$message}}
        @enderror
      </small>
    </div>
    <p class="text-danger">Don't have account? <a href="{{route('register')}}">Sign Up</a></p>
@if (session()->get('error'))
<script>swal("Opps!", "{{ session('error') }}", "error");</script>

@endif
    <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
  </form>
</div>
@endsection