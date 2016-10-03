@extends('admin.template')

@section('main')
  <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" method="post">
              <fieldset>
                  <legend>Announce </legend>
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="{{route('addannounce')}}">
                        <button type="button" name="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> New Anounnce</button>
                      </a>
                    </div>
                  </div>
                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Img</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($announces as $announce)
                      <tr>
                        <td>
                          {{$announce->title}}
                        </td>
                        <td>
                          {{$announce->content}}
                        </td>
                        <td>
                          <img src="{{URL::asset('uploads').'/'.$announce->img}}" style="width:50px;height:50px;">
                        </td>
                        <td>
                          <a href="{{route('editannounce').'/'.$announce->id}}"><span class="label label-warning">Edit</span></a>
                          <a href="{{route('deleteannounce').'/'.$announce->id}}"><span class="label label-danger">Delete</span></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
  </div>
  <script type="text/javascript">
    $(".table").datatable();
  </script>
@endsection
