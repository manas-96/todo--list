@extends('components.template')
@section('title')
    Dashboard-To Do List
@endsection
@section('search')
    <form class="d-flex">
        <input name="search" class="form-control me-2" type="search" value="{{ $search }}" placeholder="Search Task"
            aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
@endsection
@section('content')
    @if (session()->has('deleted'))
        <script>
            swal("Wow!", "{{ session('deleted') }}", "success");
        </script>
    @endif
    <h1 class="text-success text-center" style="font-family: cursive">Welcome {{ Auth::user()->name }}</h1>
    {{-- table --}}
    <p class="text-end me-5"><a href="{{ route('create') }}" class="btn btn-success">Add Task</a></p>
    <p class="text-end me-5"><a href="{{ route('logout') }}" class="btn btn-info">Log Out <img
                src="https://i.ibb.co/3hwSd3y/pngwing-com.png" height="15" width="15" alt=""> </a></p>
    @if (!$records->isEmpty())
        <section id="table">
            <div class="container">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th class="ps-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    @endif
    @forelse ($records as $record)
        <tr>
            <td>@php
                echo ++$loop->index;
            @endphp</td>
            <td>{{ $record->title }}</td>
            <td>{{ $record->description }}</td>
            <td><a type="button" href="{{ route('edit', ['id' => $record->id]) }}" class="btn btn-warning">Edit </a>
                <a type="button" href="{{ route('delete', ['id' => $record->id]) }}" class="btn btn-danger">Delete</a>

            </td>
        </tr>
    @empty
        <h2 class="text-center">No Task Found</h2>
        <h4 class="text-center">Be first to add a task: <a href="{{ route('create') }}">Add task</a></h4>
        <p class="text-center pt-2"><img src="https://i.ibb.co/HxbJGQ5/Png-Item-111981.png" height="250" width="300"
                alt=""></p>
    @endforelse
    </tbody>
    </table>
    </div>
    </section>
    <div class="row ms-5">
        {{ $records->links('pagination::bootstrap-4') }}
    </div>
@endsection
