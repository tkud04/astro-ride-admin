@extends('layout')

@section('title',"Add/Edit Configs")

@section('content')
<?php
				   $bank = $account['bank'];
				   $acnumm = $bank['acnum'];
				   $ball = $bank['balance'];
				   $statt = $bank['status'];
				   $acname = $account['fname']." ".$account['lname'];
				   $cnn = $cn;
				   
				   if(count($cg) > 0)
				   {
					   $cnn = $cg['cn'];
					   $acname = $cg['acname'];
					   $acnumm = $cg['acnum'];
					   $ball = $cg['balance'];
				       $statt = $cg['status'];
					   
				   }
				 ?>
<div class="row tm-content-row">
          <div class="col-12 tm-block-col">     
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">List of Accounts</h2>
              <p class="text-white">Accounts</p>
             <form action="{{url('cca')}}" method="post">
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
            </form><br><br>

		  
			
          </div>
        </div>
		
		@if(isset($configs) && count($configs) > 0)
		<div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">List of Configs</h2>
              <p class="text-white">Configs</p>
             <form action="{{url('cca')}}" method="post">
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
              <form action="{{url('config')}}" method="post" class="tm-signup-form row">
			     {{csrf_field()}}
				  
                <input type="hidden" name="xf" value="{{$account['id']}}">
                <div class="form-group col-lg-6">
                  <label for="phone">Config Number</label>
                  <input
                    id="phone"
                    name="cn"
					value="{{$cnn}}"
                    type="text"
					readonly
                    class="form-control validate"
                  />
                </div>
				<div class="form-group col-lg-6">
                  <label for="phone">Account Name</label>
                  <input
                    id="phone"
                    name="acname"
					value="{{$acname}}"
                    type="text"
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
				<div class="form-group col-lg-6">
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
                              <?php $ss = ($statt == $key) ? "selected='selected'" : ""; ?>
                              <option value="{{$key}}" {{$ss}}>{{$value}}</option>
                       @endforeach
                  </select>
                </div>
                <div class="form-group col-lg-12">
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                   Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
@stop