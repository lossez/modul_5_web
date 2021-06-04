@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard | Create Author</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
                @CSRF

                <div class="form-group">
                    <label for="nameInput">Name</label>
                    <input type="text" name="name" class="form-control" id="nameInput" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="pictureInput">Picture</label>
                    <input type="file" name="picture" class="form-control" id="pictureInput" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="addressInput">Address</label>
                    <textarea class="form-control" name="address" id="addressInput" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

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
