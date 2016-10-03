@extends('admin.template')

@section('main')
  <div class="row">
      <div class="well col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form class="form-horizontal" method="post">
              <fieldset>
                  <legend>New Announce</legend>
                  @if (session('status'))
                      <div class="alert alert-warning">
                        {{ session('status') }}
                      </div>
                  @endif
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group {{ $errors->first('inputUsername') ? 'has-error':'' }}">
                    <label for="inputEmail" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="Username" value="{{old('inputUsername')}}">
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('inputPassword') ? 'has-error':'' }}">
                    <label for="inputPassword" class="col-lg-2 control-label">Content</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" value="{{old('inputPassword')}}">
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('inputPassword') ? 'has-error':'' }}">
                    <label for="inputPassword" class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" value="{{old('inputPassword')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
              </fieldset>
            </form>
      </div>
  </div>
@endsection
