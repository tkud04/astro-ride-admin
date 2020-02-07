@extends("admin.layout")

@section('title',"Order")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Order</h4>
                  <p class="card-category">Update information about this order</p>
                </div>
                <div class="card-body">
                  <form action="{{url('cobra-order')}}" method="post">
                  	{!! csrf_field() !!}
                    <div class="row">
                      <div class="col-md-6">
                      	<?php
                              $o = $order; 
                              $iu = url('invoice').'?on='.$o['number']; 
                          ?>
                        <div class="form-group">
                          <label class="bmd-label-floating">Order #</label>
                          <input type="text" class="form-control" disabled value="{{$order['number']}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">User</label>
                          <input type="text" class="form-control" value="{{$order['email']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <input type="text" class="form-control" value="{{$order['status']}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type</label>
                          <input type="text" class="form-control" value="Sale">
                        </div>
                      </div>
                    </div>                          
                    
                    <button type="submit" class="btn btn-primary pull-right">Update Order</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Tasks</h6>
                  <h4 class="card-title">Invoices</h4>
                  <p class="card-description">
                    View invoice for this order. 
                  </p>
                  <a href="{{$iu}}" target="_blank" class="btn btn-primary btn-round">View Invoice</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop