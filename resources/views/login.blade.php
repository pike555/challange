<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style-bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="">
    <div class="well col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 mg-10">
            <form class="form-horizontal" method="post">
            <fieldset>
                <legend>login</legend>
                @if (session('status'))
                    <div class="alert alert-warning">
                      {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group {{ $errors->first('inputUsername') ? 'has-error':'' }}">
                  <label for="inputUsername" class="col-lg-2 control-label">Username</label>
                  <div class="col-lg-10">
                      <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="Username" value="{{old('inputUsername')}}">
                  </div>
                </div>
                <div class="form-group {{ $errors->first('inputPassword') ? 'has-error':'' }}">
                  <label for="inputPassword" class="col-lg-2 control-label">Password</label>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
