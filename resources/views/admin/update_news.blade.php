@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard | Create News</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @CSRF
                @method('PUT')

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{ $news->title }}" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="picture" class="form-control" placeholder="Name">
                </div>
                <img src="/img/{{ $news->picture }}" alt="" width="100" height="40">

                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" rows="3">{{ $news->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="is_published" id="" class="custom-select">
                        @if ($news->is_published == 0)
                            <option value="0" selected>Not Published</option>
                            <option value="1">Published</option>

                        @else
                            <option value="1" selected>Published</option>
                            <option value="0">Not Published</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <select name="author_id" id="" class="custom-select">
                        @foreach ($news->authors as $item)
                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @foreach ($author as $data)
                                <option value="{{ $data->id }}" >{{ $data->name }}</option>
                            @endforeach
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
