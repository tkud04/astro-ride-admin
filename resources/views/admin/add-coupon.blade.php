@extends("admin.layout")

@section('title',"Add Coupon")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Coupon</h4>
                  <p class="card-category">Add a new coupon to the system</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('cobra-add-coupon')}}">
                  	{!! csrf_field() !!}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Code</label>
                          <input type="text" class="form-control" name="code">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Discount e.g 70%</label>
                          <input type="text" class="form-control" name="discount">
                        </div>
                      </div>
                    </div>        
                    
                    <button type="submit" class="btn btn-primary pull-right">Add Coupon</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
@stop