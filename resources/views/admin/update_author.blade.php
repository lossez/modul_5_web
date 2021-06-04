@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard | Create Author</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('author.update', $author->id) }}" method="POST" enctype="multipart/form-data">
                @CSRF
                @method('PUT')

                <div class="form-group">
                    <label for="nameInput">Name</label>
                    <input type="text" name="name" value="{{ $author->name }}" class="form-control" id="nameInput"
                        placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="pictureInput">Picture</label>
                    <input type="file" name="picture" class="form-control mb-2" id="pictureInput" placeholder="Name">
                    <img src="/profile/{{ $author->picture }}" alt="" width="40" height="40">
                </div>
                <div class="form-group">
                    <label for="addressInput">Address</label>
                    <textarea class="form-control" name="address" id="addressInput" rows="3">{{ $author->address }}
                        </textarea>
                </div>
                <div class="float-right">

                    <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
