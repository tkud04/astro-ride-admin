@extends("admin.layout")

@section('title',"Forgot Password")

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
                  <form method="post" action="{{url('cobra-forgot-password')}}">
                  	{!! csrf_field() !!}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter your email address or phone number</label>
                          <input type="text" name="id" class="form-control" placeholder="username or email address">
                        </div>
                      </div>
                    </div>                    
                    
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
@stop