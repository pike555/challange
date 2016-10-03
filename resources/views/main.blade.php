@extends('template')

@section('main')
  <div class="row">
      @foreach ($announces as $announce)
      <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <img src="{{URL::asset('uploads').'/'.$announce->img}}" alt="100x200">
            <div class="caption">
                <h3>{{$announce->title}}</h3>
                <p>{{str_limit($announce->content, $limit = 50, $end = '...')}}</p>
            </div>
          </div>
      </div>
      @endforeach
  </div>
@endsection
