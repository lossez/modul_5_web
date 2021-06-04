@extends('adminlte::page')

@section('title', 'News')
    {{-- @section('plugins.Datatables', true) --}}
@section('content_header')
    <div class="d-flex justify-content-between">

        <h1>Dashboard | News List</h1>
        <a href="{{ route('news.create') }}" class="btn btn-success">create</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Picture</th>
                        <th>Content</th>
                        <th>Published</th>
                        <th>Author</th>
                        <th>Dibuat Pada</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)

                        <tr>
                            <td>{{ $item->title }}</td>
                            <td><img src="/img/{{ $item->picture }}" alt="" width="60" height="60"></td>
                            <td>{{ substr($item->content, 0, 150,) }}</td>
                            @if ($item->is_published == 0)
                                <td>not Published</td>
                            @else
                                <td>Published</td>  
                            @endif
                            @foreach ($item->authors as $a)
                                <td>{{ $a->name }}</td>
                            @endforeach
                            <td>{{ $item->created_at }}</td>
                            <td> 
                                <form action="{{ route('news.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    <a href="{{ route('news.show',$item->id) }}" class="btn btn-warning">edit</a>
                                </form>    
                            </td>
                        </tr>
                    @endforeach

                    </tfoot>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>
@stop
