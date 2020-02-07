@extends("admin.layout")

@section('title',"Stores")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Stores</h4>
                  <p class="card-category"> View all stores currently on the platform</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table">
                      <thead class=" text-primary">
                                                <th>Store</th>
                                                <th>No. of deals</th>
                                                <th>Total revenue</th>
                                                <th>Status</th>
                                                <th>Date created</th>
                                                <th>Actions</th>
                      </thead>
                      <tbody>
                        @if(count($stores) > 0)
                   @foreach($stores as $s)
                      <?php
                         $img = "https://res.cloudinary.com/kloudtransact/image/upload/v1563645033/uploads/".$s['img'];
                         if($s['img'] == "none") $img = "https://via.placeholder.com/150";
                         $flink = $s['flink'];
                         $dn = $s['name'];
                         $deals = $s['deals'];
                         $revenue = $s['total-revenue'];
                         $status = $s['status'];
                         $uu = url("cobra-store")."?sn=".$flink;
                  ?>
                                                 <tr>
                                                  <td>
                                                  	<center>
                                <img src="{{$img}}" class="img img-fluid cli" style="width: 40% !important;" data-cli="{{$uu}}" alt="">
                                
                                </center><br>
                             {{$dn}}
                                                  </td>
                                                  <td>{{count($deals)}}</td>
                                                  <td><span class="text-success text-bold">&#8358;{{number_format($revenue, 2)}}</span></td>
                                                  <td>
                                                  	<span class="text-primary text-bold">{{$s['status']}}</span>
                                                  </td>	
                                                  <td>{{$s['date']}}</td>
                                                  <td>
                                                      <a href="{{$uu}}" class="btn btn-primary">View</a>
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