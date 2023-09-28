@extends('components.template')
@section('title')
    Register-To Do List
@endsection
@section('content')
<h1 class="m-4 text-success text-center" style="font-family: cursive">REGISTER WITH US</h1>
<div class="container col-6">
<form action="{{route('register')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name:</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <small class="text-danger">
        @error('name')
          {{$message}}
        @enderror
      </small>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username:</label>
      <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <small class="text-danger">
        @error('username')
          {{$message}}
        @enderror
      </small>
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
    <p class="text-danger">Already registered? <a href="{{route('login')}}">Log In</a></p>

    <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
  </form>
</div>
@if (session()->get('success'))
<script>swal("Wow!", "{{ session('success') }}", "success");</script>

@endif
@endsection