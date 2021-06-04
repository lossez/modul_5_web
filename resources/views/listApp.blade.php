@extends('home')
@section('title','Profile')
@section('content')
<div class="profile">
            <div class="card">
              <h1>Todo List</h1>
              <div class="todo">
                <div class="input-items">
                  <input type="text" placeholder="Todo" class="list-input" />
                  <button class="btn-add">Tambah</button>
                </div>

                <div class="list-items">

                </div>
              </div>
              <div class="total-data">
                <div
                  style="
                    border-top: 2px solid black;
                    margin-top: 20px;
                    width: 80%;
                  "
                ></div>
                <div style="display: flex; width: 80%; padding-top: 10px">
                  <p style="flex: 1">
                    Kamu memiliki <span class="total"></span> Game
                  </p>
                  <button class="clear-btn">Clear</button>
                </div>
              </div>
            </div>
          </div>
@push('script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/todo.js') }}"></script>
@endpush          
@endsection