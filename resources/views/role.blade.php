@extends('template')

@section('main')
  <div class="row">
      <div class="well col-sm-8 col-sm-offset-2">
        <form class="form-horizontal" method="post">
          <fieldset>
              <legend>Change Role</legend>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group {{ $errors->first('inputUsername') ? 'has-error':'' }}">
                <label for="inputEmail" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-10">
                  <select class="form-control" multiple="multiple" size="5">
                      <option selected>1</option>
                      <option>2</option>
                      <option selected>3</option>
                      <option>4</option>
                      <option>5</option>
                  </select>
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
