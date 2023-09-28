@extends('components.template')
@section('title')
    Edit- To Do List
@endsection
@section('content')
@if(Session::has('update'))
<script>swal("Wow!", "{{ session('update') }}", "success");</script>
@endif

<div class="container  col-6">
    <h1 class="m-4 text-success text-center" style="font-family: cursive">EDIT YOUR TO DO LIST</h1>
    <form action="{{url()->current() }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title:</label>
            <input value="{{$task->title}}" type="text" name="title" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Enter your todo:</label>
            <br>
            <textarea name="description" placeholder="Please write something" id="desc" cols="80" rows="10">{{$task->description}}</textarea>
        </div>
        <input type="hidden" name="id" value="{{$task->id}}"> 
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection