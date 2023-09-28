@extends('components.template')
@section('title')
    To Do List
@endsection
@section('content')
    <h1 class="text-center text-success m-2" style="font-family:cursive">NEVER MISS YOUR DAILY WORK</h1>
    <div class="container">
        <div class="row m-2 col-sm-12">
            <img src="https://blog.hubspot.com/hubfs/To_Do_List.png" height="300px" alt="">

        </div>
    </div>
    <div class="d-flex justify-content-center gap-5">
        <a type="button" href="{{ route('register') }}" class="btn btn-primary">Register</a>
        <a type="button" href="{{ route('login') }}" class="btn btn-primary">Log In</a>
    </div>
@endsection
