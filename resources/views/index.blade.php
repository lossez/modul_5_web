@extends('home')
@section('title','Home')
@section('content')
      @foreach ($news as $item)
          
          <article>
            <div class="card">
              <p class="content-title">{{ $item->title }}</p>
              <p class="post-date">
                {{ \Carbon\Carbon::parse($item->from_date)->format('D, d M Y')}} by {{ $item['authors']['0']->name }}
              </p>
              <div class="pt-10"></div>
              <img
                src="img/{{$item->picture }}"
                alt=""
                class="content-img"
              />
              <div class="">
                <p>
                  {{ $item->content }}
                </p>
              </div>
            </div>
          </article>  
      @endforeach
    
@endsection