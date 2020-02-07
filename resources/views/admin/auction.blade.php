@extends("admin.layout")

@section('title',"Auction")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Auction</h4>
                  <p class="card-category">View information about this auction</p>
                </div>
                <div class="card-body">
                  <form>
                  	{!! csrf_field() !!}
                    <div class="row">
                      <div class="col-md-4">
                      	<?php
                              $a = $auction; 
                              $deal = $a['deal'];
                                                $bids = $a['bids'];
                                                $uu = url('cobra-auction').'?xf='.$a['id']; 
                                                
                                                $timeline = "";
                                                if($a['days'] > 0) $timeline .= $a['days']." days ";
                                                if($a['hours'] > 0) $timeline .= $a['hours']." hours ";
                                                if($a['minutes'] > 0) $timeline .= $a['minutes']." minutes";
                                                $au = url('cobra-end-auction')."?xf=".$a['id'];
                          ?>
                        <div class="form-group">
                          <label class="bmd-label-floating">Deal Name</label>
                          <input type="text" class="form-control" disabled value="{{$deal['name']}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Start Time</label>
                          <input type="text" class="form-control" disabled value="{{$a['date']}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Duration</label>
                          <input type="text" class="form-control" value="{{$timeline}}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <input type="text" class="form-control" disabled value="{{$a['category']}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Total Bids</label>
                          <input type="text" class="form-control" disabled value="{{count($bids)}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <input type="text" class="form-control" value="{{$a['status']}}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">                      
                      <div class="col-md-12">
                      	<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Bids </h4>
                  <p class="card-category"> View all bids on this auction </p>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                    <table class="table kloud-data-table">
                      <thead class=" text-primary">
                                                <th>User</th>
                                                <th>Current Bid</th>
                                                <th>Bid Time</th>
                      </thead>
                      <tbody>
                        @if($bids != null && count($bids) > 0)
                                              @foreach($bids as $b)
                                              <?php
                                                $bidder = $b['user'];
                                              ?>
                                                 <tr>
                                                  <td class="text-primary">{{$bidder['email']}}</td>
                                                  <td>&#8358;{{$b['amount']}}</td>
                                                  <td>{{$b['date']}}</td>
                                                 </tr>
                                              @endforeach
                                            @endif
                      </tbody>
                    </table>
                  </div>
                  </div>
                  </div>
                      </div>
                    </div>                          
                    
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
                  <h4 class="card-title">End Auction</h4>
                  <p class="card-description">
                    Stops this auction and adds this deal to the highest bidder's cart
                  </p>
                  <a href="{{$au}}" class="btn btn-primary btn-round">End Auction</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop