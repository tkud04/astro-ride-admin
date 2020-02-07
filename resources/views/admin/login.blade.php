@extends("admin.layout")

@section('title',"Login")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Log in</h4>
                  <p class="card-category">Log in to access the admin app</p>
                </div>
                <div class="card-body">
                	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
                  <form method="post" action="{{url('admin')}}">
                  	{!! csrf_field() !!}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID</label>
                          <input type="text" name="id" class="form-control" placeholder="username or email address">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="pass" class="form-control" placeholder="Password">
                        </div>
                      </div>
                    </div>                    
                    
                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                    <a href="{{url('cobra-forgot-password')}}">Reset password</a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
@stop