@extends('adminlte::page')

@section('title', 'Author')
    {{-- @section('plugins.Datatables', true) --}}
@section('content_header')
    <div class="d-flex justify-content-between">

        <h1>Dashboard | Author List</h1>
        <a href="{{ route('author.create') }}" class="btn btn-success">create</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gambar</th>
                        <th>Address</th>
                        <th>Total Published News</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($author as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img src="/profile/{{ $item->picture }}" alt="" width="40" height="40">
                            </td>
                            <td>{{ $item->address }}</td>
                            <td> - </td>
                            <td> 
                                <form action="{{ route('author.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    <a href="{{ route('author.show',$item->id) }}" class="btn btn-warning">edit</a>
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
