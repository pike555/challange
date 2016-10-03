@extends('template')

@section('main')
  <div class="row">
      <div class="col-xs-12">
          <div class="thumbnail">
            <img src="{{URL::asset('uploads').'/'.$announce->img}}" class="img-responsive">
            <div class="caption">
                <h3>{{$announce->title}}</h3>
                <p>{{$announce->content}}</p>
            </div>
          </div>
      </div>
  </div>
@endsection
