@extends("admin.layout")

@section('title',"View Store")

@section('kojo')
 <script>
    addEditor($(".kojo-control"),"estore","description");
	$('#estore').html(`{!!$store['description']!!}`);
	$('#description').val(`{!!$store['description']!!}`);
  </script>
@stop

@section('content')
<?php 
$ct = (isset($category) && $category != null) ? " - ".$category : ""; 
$deals = (isset($store["deals"])) ? $store["deals"] : [];

$img = "https://res.cloudinary.com/kloudtransact/image/upload/v1563645033/uploads/".$store['img'];
 if($store['img'] == "none") $img = "https://via.placeholder.com/150";
?>
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Store</h4>
                  <p class="card-category">View, edit or remove this store</p>
                </div>
                <div class="card-body">
                  <form method='post' action="{{url('cobra-store')}}">
                  	{!! csrf_field() !!}
                     <input type="hidden" name="ird" id="ird" value="{{$store['img']}}" required>
                     <input type="hidden" name="dri" id="dri" value="{{$store['id']}}" required>
                     <input type="hidden" name="description" id="description" value="" required>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input name='name' type="text" class="form-control" value="{{$store['name']}}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Image</label>
                          <img class="img img-fluid mx-auto d-block" src="{{$img}}"><br>       
                         <?php
                                           if($store['img'] == "none"){                                       	
                                          ?>
                                          <button id="store-upload" class="cloudinary-button">Upload new logo</button>
                                          <span id="cloudinary-loading">It usually takes a few minutes to upload images so please be patient when you click Upload above :)</span>
                                          <?php
                                           }
                                           else{
                                           $dri = url('dri')."?loc=edit-store&ird=".$store['img'];
                                          ?>
                                          <a href="{{$dri}}" class="amado-btn mb-3">Delete image</a>
                                          <?php
                                           }
                                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>                         
                          <select class="form-control" name='status' required>
                          	<option value="none">Select category</option>
                              <?php $op = ['approved' => "Verified",'pending' => "Pending",'disabled' => "Disabled"]; ?>
                              @foreach($op as $key => $value)
                              <?php $ss = ($store['status'] == $key) ? 'selected="selected"' : ''; ?>
                              <option value="{{$key}}" {{$ss}}>{{$value}}</option>
                              @endforeach
                          </select>
                        </div><br>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Friendly URL</label>
                          <input name='flink' type="text" class="form-control" value="{{$store['flink']}}" required>
                        </div>
                      </div>
                    </div> 

                    <div class="row mt-5">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rating</label>                         
                          @for($s = 0; $s < $store['rating']; $s++)
                                          <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                        @endfor
                        </div><br>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <div class='kojo-control'>
                            	
                            </div>
                        </div>
                      </div>
                    </div>                      
                    
                    <button type="submit" class="btn btn-primary pull-right">Update Store</button>
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
                  <h4 class="card-title">Store Management</h4>
                  
                  <p class="card-description mt-5">
                    Removes this store from the system. 
                  </p>
                  <?php $deleteURL = url('delete-store').'?xf='.$store['id']; ?>
                  <a href="{{$deleteURL}}" class="btn btn-primary btn-round">Delete Store</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop