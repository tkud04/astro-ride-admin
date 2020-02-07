@extends("admin.layout")

@section('title',"User")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View User</h4>
                  <p class="card-category">View information about this user</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('cobra-user')}}">
                    {!! csrf_field() !!}
                    
                    <?php
                      $fund_url = url('cobra-fund-wallet').'?xf='.$account['email'];
                      $balance = $account['wallet']['balance'];
                    ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" name="fname" class="form-control" value="{{$account['fname']}}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="lname" class="form-control" value="{{$account['lname']}}" required>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">                  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" class="form-control" value="{{$account['email']}}" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" name="phone" class="form-control" value="{{$account['phone']}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Account Balance</label>
                          <input type="text" class="form-control" value="&#8358;{{number_format($balance,2)}}" disabled>
                        </div>
                      </div>
                    </div>   
                    <div class="row mt-5">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Role</label>
                          <select class="form-control" name="role">
                          	<option value="none">Select role</option>
                              <?php 
                              $iss = ['user' => 'User','admin' => 'Admin','su' => 'Super Admin'];                           
                              foreach($iss as $key => $value){ 
                              	$ss = ($account['role'] == $key) ? 'selected="selected"' : ''; 
                              ?>
                               <option value="<?=$key?>" <?=$ss?>><?=$value?></option>
                              <?php } ?>                             
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control" name="status">
                          	<option value="none">Select status</option>
                              <?php 
                              $iss = ['enabled' => 'Active','disabled' => 'Suspended'];                           
                              foreach($iss as $key => $value){ 
                              	$ss = ($account['status'] == $key) ? 'selected="selected"' : ''; 
                              ?>
                               <option value="<?=$key?>" <?=$ss?>><?=$value?></option>
                              <?php } ?>                             
                          </select>
                        </div>
                      </div>
                    </div>   
                    
                    <button type="submit" class="btn btn-primary pull-right">Update User</button>
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
                  <h4 class="card-title">User Management</h4>
                  <p class="card-description">
                    Fund this user's wallet. 
                  </p>
                  
                  <a href="{{$fund_url}}" class="btn btn-primary btn-round">Fund Wallet</a><br>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop