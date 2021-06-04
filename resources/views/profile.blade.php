@extends('home')
@section('title','Profile')
@section('content')
<div class="profile">
          <div class="card">
            <img src="{{ asset('img/blank-profile-picture-973460_640.png') }}" alt="" class="profile-image" />
            <div class="profile-data">
              <p>Name : Ahmad Taqiudin Ahyari</p>
              <p>Email : game@pro.com</p>
              <p>phone : +6201823121</p>
              <p>address : Indonesia </p>
            </div>
          </div>
        </div>
@endsection