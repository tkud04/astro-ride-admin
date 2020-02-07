@extends("admin.layout")

@section('title',"Blog")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{$post['title']}}</h4>
                  <p class="card-category">KloudTransact Blog</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('cobra-post')}}">
                  	{!! csrf_field() !!}
					<input type="hidden" name="xf" value="{{$post['id']}}" required>
					
					<?php
                              $pu = "cobra-delete-post")."?xf=".$post['id'];
                              
                              $img = $p['img'];
                                      $imggs = [];
                         
                                      if($img == "none") { $imggs = ["https://via.placeholder.com/150"]; }
                                      else{
                                      	$irdc = $p['irdc'];
                                      	for($x = 0; $x < $irdc; $x++){
                                      	 $jara = "";
                                            if($x > 0) $jara = "-".($x + 1);
                                      	  $imgg = "https://res.cloudinary.com/kloudtransact/image/upload/v1563645033/uploads/".$ird.$jara;
                                            array_push($imggs,$imgg); 
                                          }
                                      }       
                          ?>
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          @if(count($imggs) > 0)
                                                   	@for($a = 0; $a < count($imggs); $a++)
                                                   	<?php
                                                   	$imgg = $imggs[$a];
                                                   	$active = ($a == 0) ? "active" : "";
                                                   	?>
                                                   	<img src="{{$img}}" class="img img-fluid" width="200">
                                                   	@endfor
                                                       @endif
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title" value="{{$post['title']}}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Friendly URL</label>
                          <input type="text" class="form-control" name="flink" value="{{$post['flink']}}" required>
                        </div>
                      </div>
                    </div>  
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Posted by</label>
                          <p class="form-control-plaintext">{{$post['user']}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select class="form-control" name="category">
                          	<option value="none">Select role</option>
                              <?php 
                              $iss = ['all' => 'All','news' => 'Latest news'];                           
                              foreach($iss as $key => $value){ 
                              	$ss = ($post['category'] == $key) ? 'selected="selected"' : ''; 
                              ?>
                               <option value="<?=$key?>" <?=$ss?>><?=$value?></option>
                              <?php } ?>                             
                          </select>
                        </div>
                      </div>
                    </div>  
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Stats</label>
                          <p class="form-control-plaintext">{{$post['likes']}} likes</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control" name="status">
                          	<option value="none">Select status</option>
                              <?php 
                              $iss = ['active' => 'Active','disabled' => 'Disabled'];                           
                              foreach($iss as $key => $value){ 
                              	$ss = ($post['status'] == $key) ? 'selected="selected"' : ''; 
                              ?>
                               <option value="<?=$key?>" <?=$ss?>><?=$value?></option>
                              <?php } ?>                             
                          </select>
                        </div>
                      </div>
                    </div> 
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Content</label>
                          <textarea class="form-control" name="content" value="{{$post['content']}}"></textarea>
                        </div>
                      </div>
                    </div>                       
                    <button type="submit" class="btn btn-primary pull-right">Add Post</button>
					
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
                  <h4 class="card-title">Delete Post</h4>
                  <p class="card-description">
                   Deletes this blog post from system
                  </p>
                  <a href="{{$pu}}" class="btn btn-primary btn-round">Delete Post</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop