@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard | Create News</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @CSRF

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="picture" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="is_published" id="" class="custom-select">
                        <option value="" selected>Select Status</option>
                        <option value="0">Not Published</option>
                        <option value="1">Published</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <select name="author_id" id="" class="custom-select">
                        <option value="" selected>Select Author</option>
                        @foreach ($author as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
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
