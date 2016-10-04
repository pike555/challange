@extends('template')

@section('main')
  <div class="row">
      @foreach ($announces as $key => $announce)
      <div class="col-sm-6 col-md-3 col-lg-3">
          <div class="thumbnail">
            <a href="{{route('showannounce').'/'.$announce->id}}">
              <img src="{{URL::asset('uploads').'/'.$announce->img}}" alt="100x200">
              <div class="caption">
                  <h3>{{$announce->title}}</h3>
                  <p>{{str_limit($announce->content, $limit = 50, $end = '...')}}</p>
              </div>
            </a>

          </div>
      </div>
        @if(($key+1) % 4==0)
          <div class="clearfix visible-md visible-lg"></div>
        @endif
      @endforeach
  </div>
@endsection
