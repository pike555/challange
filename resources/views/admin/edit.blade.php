@extends('admin.template')

@section('main')
  <div class="row">
      <div class="well col-sm-12">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <fieldset>
                  <legend>New Announce</legend>
                  @if (session('status'))
                      <div class="alert alert-warning">
                        {{ session('status') }}
                      </div>
                  @endif
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="inputId" value="{{ $announce->id }}">
                  <div class="form-group {{ $errors->first('inputTitle') ? 'has-error':'' }}">
                    <label for="inputTitle" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="inputTitle" id="inputTitle"  placeholder="Title" value="{{$announce->title}}">
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('inputContent') ? 'has-error':'' }}">
                    <label for="inputContent" class="col-lg-2 control-label">Content</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="inputContent" name="inputContent" placeholder="Content">{{$announce->content}}</textarea>
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('inputImg') ? 'has-error':'' }}">
                    <label for="inputImg" class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="inputImg" id="inputImg" accept=".jpg" onchange="readURL(this);" value="test">
                        <img src="{{URL::asset('uploads').'/'.$announce->img}}" id="blah" style="width:150px;height:150px;">
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('inputRole') ? 'has-error':'' }}">
                    <label for="inputRole" class="col-lg-2 control-label">Role</label>
                    <div class="col-lg-10">
                      <select class="form-control" multiple="multiple" size="5" name="inputRole[]">
                        @foreach ($roles as $role)
                          <option value="{{$role->id}}"
                            @foreach ($selectRoles as $selectRole)
                              {{$selectRole->role_id==$role->id?'selected':''}}
                            @endforeach
                          >{{$role->name}}</option>
                        @endforeach
                      </select>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="inputAllrole" {{$selectRoles[0]->role_id==0?'checked':''}}> All Role
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
  <script type="text/javascript">
    function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#blah')
                      .attr('src', e.target.result)
                      .width(150)
                      .height(150);
              };
              reader.readAsDataURL(input.files[0]);
          }
      }
  </script>
@endsection
