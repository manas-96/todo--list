@extends('components.template')
@section('title')
    Create- To Do List
@endsection
@section('content')
    <div class="container  col-6">
        <h1 class="m-4 text-success text-center" style="font-family: cursive">CREATE YOUR TO DO LIST</h1>
        <form action="{{ route('create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title:</label>
                <input autocomplete="off" type="text" name="title" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Enter your todo:</label>
                <br>
                <textarea autocomplete="" name="description" placeholder="Please write something" id="desc" cols="80" rows="10"></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Create </button>
            </div>
        </form>
        @if (session()->get('success'))
        <script>swal("Wow!", "{{ session('success') }}", "success");</script>
        @endif
    </div>
@endsection
