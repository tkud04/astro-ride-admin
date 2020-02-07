@extends("admin.layout")

@section('title',"View Deal")

@section('content')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Deal</h4>
                  <p class="card-category">View, edit or remove this deal</p>
                </div>
                <div class="card-body">
                  <form method='post' action="{{url('cobra-deal')}}">
                  	{!! csrf_field() !!}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input name='name' type="text" class="form-control" value="{{$deal['name']}}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">SKU</label>
                          <input name='sku' type="text" class="form-control" value="{{$deal['sku']}}" required>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>                         
                          <select class="form-control" name='category' required>
                          	<option value="none">Select category</option>
                              @foreach($c as $key => $value)
                              <?php $ss = ($deal['category'] == $key) ? 'selected="selected"' : ''; ?>
                              <option value="{{$key}}" {{$ss}}>{{$value}}</option>
                              @endforeach
                          </select>
                        </div><br>
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control" name='description' required>{{$deal['data']['description']}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price (&#8358;)</label>
                          <input name='amount' type="number" class="form-control" value="{{$deal['data']['amount']}}" required>
                        </div><br>
                        <div class="form-group">
                          <label class="bmd-label-floating">Images</label>
                          <div class="row">
                          	<?php
                                if(count($deal['images']) < 1){ $imgg = "https://via.placeholder.com/150";}
                                else{
                                $ird = $deal['images'][0]['url'];
                                $imgg = "https://res.cloudinary.com/kloudtransact/image/upload/v1563645033/uploads/".$ird;
                                }
                              ?>
                          	<div class="col-md-6"><img class="img img-fluid mx-auto d-block" src="{{$imgg}}"></div>                     
                          </div>
                        </div>
                      </div>
                    </div>   
                    <div class="row mt-5">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rating</label>
                          <span class="form-control">
                          	<?php for($u = 0; $u < $deal['rating']; $u++){ ?>
                            	<i class="material-icons text-primary">star</i>
                              <?php } ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Inventory status</label>
                          <select class="form-control" name='in_stock' required>
                          	<option value="none">Select inventory status</option>
                              <?php 
                              $iss = ['yes' => 'In stock','new' => 'New!','no' => 'Out of Stock'];                           
                              foreach($iss as $key => $value){ 
                              	$ss = ($deal['data']['in_stock'] == $key) ? 'selected="selected"' : ''; 
                              ?>
                              <option value="<?=$key?>" <?=$ss?>><?=$value?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control" name='status' required>
                          	<option value="none">Select status</option>
                              <?php 
                              $suss = ['approved' => 'Approved','pending'=> "Pending",'rejected' => 'Rejected'];                           
                              foreach($suss as $key => $value){ 
                              	$ss = ($deal['status'] == $key) ? 'selected="selected"' : ''; 
                              ?>
                              <option value="<?=$key?>" <?=$ss?>><?=$value?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>                       
                    
                    <button type="submit" class="btn btn-primary pull-right">Update Deal</button>
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
                  <h4 class="card-title">Deal Management</h4>
                  <p class="card-description">
                    Create an auction listing. 
                  </p>
                  <?php $auctionURL = url('cobra-add-auction').'?xf='.$deal['id']; ?>
                  <a href="{{$auctionURL}}" class="btn btn-primary btn-round">Add Auction</a>
                  
                  <p class="card-description mt-5">
                    Removes this deal from the system. 
                  </p>
                  <?php $deleteURL = url('cobra-delete-deal').'?sku='.$deal['sku']; ?>
                  <a href="{{$deleteURL}}" class="btn btn-primary btn-round">Delete Deal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop