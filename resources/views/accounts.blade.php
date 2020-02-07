@extends('layout')

@section('title',"Accounts")

@section('content')
<div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">List of Accounts</h2>
              <p class="text-white">Accounts</p>
             <form action="{{url('ca')}}" method="post">
				 {{csrf_field()}}
			 <select class="custom-select" name="acc">
                <option value="none">Select account</option>
				@foreach($accounts as $a)
                <?php $ss = ($account['id'] == $a['id']) ? "selected='selected'" : ""; ?>
                <option value="{{$a['id']}}" {{$ss}}>{{$a['fname']." ".$a['lname']}}</option>
				@endforeach              
              </select>
            </div>
			      <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    submit
                  </button>
            </form>
          </div>
        </div>
		
		@if(isset($configs) && count($configs) > 0)
		<div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">List of Configs</h2>
              <p class="text-white">Configs</p>
             <form action="{{url('ca')}}" method="post">
				 {{csrf_field()}}
			 <select class="custom-select" name="acc">
                <option value="none">Select config</option>
				@foreach($configs as $c)
                <?php $ss = (isset($cg['cn']) && $cg['cn'] == $c['cn']) ? "selected='selected'" : ""; ?>
                <option value="{{$c['cn']}}" {{$ss}}>{{$c['cn']}}</option>
				@endforeach              
              </select>
			   <input type="hidden" name="xf" value="{{$account['id']}}">
            </div>
			      <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    submit
                  </button>
            </form>
          </div>
        </div>
		@endif
        <!-- row -->
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">Bank</h2>
              <div class="tm-avatar-container">
                <img
                  src="img/lgg.png"
                  alt="First Fidelity Bank"
                  class="tm-avatar img-fluid mb-4"
                />
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
              <form action="{{url('accounts')}}" method="post" class="tm-signup-form row">
			     {{csrf_field()}}
				 <?php
				   $bank = $account['bank'];
				   $acnumm = $bank['acnum'];
				   $ball = $bank['balance'];
				   $statt = $bank['status'];
				   $fname = $account['fname'];
				   $lname = $account['lname'];
				   
				   if(count($cg) > 0)
				   {
					   $acnumm = $cg['acnum'];
					   $ball = $cg['balance'];
				       $statt = $cg['status'];
					   $fullName = explode(' ',$cg['acname']);
					   if(count($fullName) > 1)
					   {
						  $fname = $fullName[0]; 
						  if(isset($fullName[1])) $lname = $fullName[1]; 
						  else $lname = "";	
					   }
				   }
				 ?>
                <div class="form-group col-lg-6">
                  <label for="name">First Name</label>
                  <input
                    id="name"
                    name="fname"
					value="{{$fname}}"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Last Name</label>
                  <input
                    id="email"
                    name="lname"
					value="{{$lname}}"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">E-mail Address</label>
                  <input
                    id="password"
                    name="email"
					value="{{$account['email']}}"
                    type="email"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">Phone </label>
                  <input
                    id="password2"
                    name="phone"
					value="{{$account['phone']}}"
                    type="tel"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Account Number</label>
                  <input
                    id="phone"
                    name="acnum"
					value="{{$acnumm}}"
                    type="text"
                    class="form-control validate"
                  />
                </div>
				<div class="form-group col-lg-6">
                  <label for="phone">Account Balance($)</label>
                  <input
                    id="phone"
                    name="balance"
					value="{{$ball}}"
                    type="text"
                    class="form-control validate"
                  />
                </div>
				<div class="form-group col-lg-12">
                  <label for="phone">Account Status</label>
				  <?php
				    $statuses = ['active' => "ACTIVE", 'dormant' => "DORMANT"];
				  ?>
                  <select
                    id="phone"
                    name="status"
                    class="form-control validate"
					>
					  @foreach($statuses as $key => $value)
                              <?php $ss = ($statt == $key) ? 'selected="selected"' : ''; ?>
                              <option value="{{$key}}" {{$ss}}>{{$value}}</option>
                              @endforeach
                  </select>
				  @if(count($cg) > 0)
					  <input type="hidden" name="cn" value="{{$cg['cn']}}">
				  @endif
                </div>
                <div class="form-group col-lg-6">
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Update Account
                  </button>
                </div>
                <div class="col-6">
                  <a
                    href="#"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Delete Account
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
@stop