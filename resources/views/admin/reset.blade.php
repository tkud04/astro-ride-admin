@extends("admin.layout")

@section('title',"Reset Password")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Forgot password? </h4>
                  <p class="card-category">Send a reset link to your email</p>
                </div>
                <div class="card-body">
                	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
                  <form method="post" action="{{url('reset')}}">
                  	{!! csrf_field() !!}
                     <input type="hidden" name="acsrf" value="{{$user->id}}">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter your new password</label>
                          <input type="password" name="pass" class="form-control" placeholder="enter new password">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm new password</label>
                          <input type="password" name="pass_confirmation" class="form-control" placeholder="enter new password again">
                        </div>
                      </div>
                    </div>                    
                    
                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
@stop