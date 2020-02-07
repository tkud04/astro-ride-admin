@extends("admin.layout")

@section('title',"Site config")

@section('content')
<script> let cbd = "slider";</script>
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Site Configuration</h4>
                  <p class="card-category">Manage your website configuration options</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('cobra-be')}}">
                  	{!! csrf_field() !!}
                  <?php
                  $cc = [];
                   if(count($config) > 0)
                   {
                   	foreach($config as $c)
                       {
                       	$key = $c['item'];
                           $value = $c['value'];
                       	$cc[$key] = $value; 
                       }
                   }
                  ?>
					  <input type="hidden" name="ird" id="ird" value="$cc['Ird']" required>
                      <input type="hidden" name="irdc" id="irdc" value="$cc['Irdc']" required>
                                   	
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Delivery fee (&#8358;)</label>
                          <input type="number" class="form-control" name="delivery" value="{{$cc['delivery']}}" placeholder="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Slider Images</label>
                          <button id="blog-upload" class="cloudinary-button">Upload</button>
                          <span id="cloudinary-loading">It usually takes a few minutes to upload images so please be patient when you click Upload above :)</span>
                        </div>
                      </div>
                    </div>  
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Withdrawal fee (&#8358;)</label>
                          <input type="number" class="form-control" name="withdrawal" value="{{$cc['withdrawal']}}" placeholder="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Transfer limit (&#8358;) - enter 0 for unlimited</label>
                          <input type="number" class="form-control" name="transfer" value="{{$cc['transfer']}}"  placeholder="" required>
                        </div>
                      </div>
                    </div>  
					   
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
@stop