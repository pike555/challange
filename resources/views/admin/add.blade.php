@extends('admin.template')

@section('main')
  <div class="row">
      <div class="well col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <fieldset>
                  <legend>New Announce</legend>
                  @if (session('status'))
                      <div class="alert alert-warning">
                        {{ session('status') }}
                      </div>
                  @endif
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group {{ $errors->first('inputTitle') ? 'has-error':'' }}">
                    <label for="inputEmail" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="inputTitle" id="inputTitle"  placeholder="Title" value="{{old('inputTitle')}}">
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('inputContent') ? 'has-error':'' }}">
                    <label for="inputPassword" class="col-lg-2 control-label">Content</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="inputContent" name="inputContent" placeholder="Content">{{old('inputContent')}}</textarea>
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('inputImg') ? 'has-error':'' }}">
                    <label for="inputPassword" class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="inputImg" id="inputImg" accept=".jpg">
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('inputRole') ? 'has-error':'' }}">
                    <label for="inputEmail" class="col-lg-2 control-label">Role</label>
                    <div class="col-lg-10">
                      <select class="form-control" multiple="multiple" size="5" name="inputRole[]">
                        @foreach ($roles as $role)
                          <option value="{{$role->id}}" selected="">{{$role->name}}</option>
                        @endforeach
                      </select>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="inputAllrole"> All Role
                        </label>
                      </div>
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
