@extends("admin.layout")

@section('title',"View Coupon")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Coupon</h4>
                  <p class="card-category">View, edit or remove this coupon</p>
                </div>
                <div class="card-body">
                  <form action="{{url('cobra-coupon')}}" method="post">
                  	{!! csrf_field() !!}
                      <input type="hidden" name="xf" value="{{$coupon['id']}}">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Code</label>
                          <input type="text" name="code" class="form-control" value="{{$coupon['code']}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Discount(%)</label>
                          <input type="text" name="discount" class="form-control" value="{{$coupon['discount']}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>                         
                          <select class="form-control" name="status">
                          	<?php
                                $ar = ['active' => "Active",'disabled' => "Disabled"];
                              ?>
                          	<option value="none">Select status</option>
                              <?php
                                foreach($ar as $key => $value){ 
                                	$snm = ($coupon['status'] == $key) ? "selected='selected'" : "";
                               ?>
                              <option value="{{$key}}" {{$snm}}>{{$value}}</option>
                              <?php
                                }
                               ?>
                          </select>
                        </div>
                      </div>
                    </div>                                 
                    <?php
                       $uu = url("cobra-delete-coupon")."?xf=".$coupon['id'];
                     ?>
                    <button type="submit" class="btn btn-primary pull-right">Update Coupon</button>
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
                  <h4 class="card-title">Coupon Management</h4>
                  <p class="card-description">
                    Delete this coupon. 
                  </p>
                  <a href="{{$uu}}" class="btn btn-primary btn-round">Delete Coupon</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop