@extends("admin.layout")

@section('title',"View Comment")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Comment</h4>
                  <p class="card-category">View or edit information about this comment.</p>
                </div>
                <div class="card-body">
                  <form action="{{url('cobra-comment')}}" method="post">
                  	{!! csrf_field() !!}
                     <input type="hidden" name="xf" value="{{$comment['id']}}">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Deal</label>
                          <a class="form-control" href="#">{{$comment['deal']}}</a>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Comment</label>
                          <textarea class="form-control" name="comment">{{$comment['comment']}}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">User</label>
                          <a class="form-control" href="#">{{$comment['user']}}</a>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control" name="status">
                          	<?php
                                $ar = ['pending' => "Pending",'active' => "Approved",'disabled' => "Disabled"];
                              ?>
                          	<option value="none">Select status</option>
                              <?php
                                foreach($ar as $key => $value){ 
                                	$snm = ($comment['status'] == $key) ? "selected='selected'" : "";
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
                     #  $uu = url("cobra-delete-coupon")."?xf=".$comment['id'];
                     ?>
                    <button type="submit" class="btn btn-primary pull-right">Update Comment</button>
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
                  <h4 class="card-title">Manage Comment</h4>
                  <p class="card-description">
                    Delete this comment. This will remove the comment from the system entirely. <br>
                    If you want to just hide it, update the status to </strong>Rejected</strong>
                  </p>
                  <a href="#" class="btn btn-primary btn-round">Delete Comment</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop