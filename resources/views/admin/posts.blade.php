@extends("admin.layout")

@section('title',"Posts")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Posts <a href="{{url('cobra-add-post')}}">Add New Post</a></h4>
                  <p class="card-category"> View all blog posts </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table">
                      <thead class=" text-primary">
                                                <th>Post</th>
                                                <th>Friendly URL</th>
                                                <th>Likes</th>
                                                <th>Posted by</th>
                                                <td>Actions</td>
                      </thead>
                      <tbody>
                        @if($posts != null && count($posts) > 0)
                                              @foreach($posts as $p)
                                              <?php
                                                $uu = url('cobra-post')."?id=".$p['flink'];

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
                                                 <tr>                                               
                                                  <td>
                                                   <center>
                                                   	@if(count($imggs) > 0)
                                                   	@for($a = 0; $a < count($imggs); $a++)
                                                   	<?php
                                                   	$imgg = $imggs[$a];
                                                   	$active = ($a == 0) ? "active" : "";
                                                   	?>
                                                   	<img src="{{$img}}" class="img img-fluid" width="200">
                                                   	@endfor
                                                       @endif
                                                   	</center><br>
                                                      {{$p['title']}}
                                                  </td>
                                                  <td>{{$p['flink']}}</td>
                                                  <td class="text-primary">{{$p['likes']}} likes</td>
                                                  <td>{{$p['user']}}</td>
                                                  <td>
                                                    <a class="btn btn-success" href="{{$uu}}">View</a>
                                                  </td>
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
        </div>
      </div>
@stop