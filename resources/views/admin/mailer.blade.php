@extends("admin.layout")

@section('title',"Bulk Email Sender")

@section('content')
<?php

?>
      <div class="content">
        <div class="container-fluid">
          

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Bulk Mailer</h4>
                  <p class="card-category">Select leads, set message details, send emails and view sending progress. </p>                 
                </div>
                <div class="card-body">
				
				 <!-------- Mailer form ------->
				 <form id="msg-form">
                  	<input type="hidden" id="ggg" value="{{csrf_token()}}">
										<input type="hidden" id="gg" value="{{url('bomb')}}">
					
                                   	
                    <div class="row">
					  <h5 class="card-title">Message Options</h5>
                      <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sender Name</label>
                          <input class="form-control"name="sn" id="sn" type="text" >
                        </div>
                      </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sender address</label>
                          <input class="form-control"name="sa" id="sa" type="text" >
                        </div>
                      </div>
					  <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Subject</label>
                          <input class="form-control"name="subject" id="subject" type="text" >
                        </div>
                      </div>
                    </div>  
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Compose message</label>
                          <textarea class="form-control summernote" name="message" id="message"></textarea>
                        </div>
                      </div>
                     
                    </div>  
					   
                   <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
				 <!-------- End of mailer form ------->
                 <br><br>
				 
				 <h5 class="card-title">Leads <a class="btn btn-secondary text-warning pull-right" href="{{url('delete-leads')}}">Delete leads</a></h5>
				 <br>
				 <form action="{{url('leads')}}" method="post">
									{!! csrf_field() !!}
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Click here to select leads type</label>
                          <select class="form-control" name="leads">
                          	<option value="none">Select leads</option>
                              <?php 
                              $iss = ['merchants' => 'Merchants','users' => 'Customers','test' => 'Test','all' => 'All users'];                           
                              foreach($iss as $key => $value){ 
                              	$ss = (isset($sl)) ? 'selected="selected"' : ''; 
                              ?>
                               <option value="<?=$key?>" <?=$ss?>><?=$value?></option>
                              <?php } ?>                             
                          </select>
                        </div>
                      </div>
                     
                    </div> 		
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>					
									</form><br>
				 <!-------- Table results ------->
                  <div class="table-responsive">
                  <table class="table table-hover kloud-data-table" id="leads-table">
                    <thead class="text-warning">
                      <th class="text-center">#</th>
                       <th>Email address</th>
                        <th class="text-center">Status</th>
                         <th class="text-center">Remarks</th>
                    </thead>
                    <tbody>
                    @if(isset($leads)) 
											<?php
										     $ctr = 0;
											?>
                                            @foreach($leads as $l) 
                                            <?php
										     ++$ctr;
											 $lb = "bdg-".$l['id'];
											 $lr = "rmk-".$l['id'];
											?>
											<tr>
                                                <td class="text-center text-muted">{{$ctr}}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$l['email']}}</div>
                                                                <!--<div class="widget-subheading opacity-7">Web Developer</div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                	<?php
                                                       $badge = "warning";
													   if($l['status'] === "sent") $badge = "success";
													   if($l['status'] === "failed") $badge = "danger";
                                                    ?>
                                                    <div class="badge badge-{{$badge}}" data-badge="badge-{{$badge}}" id="{{$lb}}">{{$l['status']}}</div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="" id="{{$lr}}"></div>
                                                </td>
                                            </tr>
                                           @endforeach
                                           @endif
                    </tbody>
                  </table>
                  </div>				 
				 <!-------- End of Table results ------->

                </div>
              </div>
            </div>
                  
          </div>
        </div>
      </div>
@stop