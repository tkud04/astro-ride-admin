@extends("admin.layout")

@section('title',"Auctions")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Auctions</h4>
                  <p class="card-category"> View all Kloud Auctions </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table">
                      <thead class=" text-primary">
                                                <th>Auction</th>
                                                <th>Amount</th>
                                                <th>Total bids</th>
                                                <th>Time left</th>
                                                <th>Status</th>
                                                <th>Highest bidder</th>
                                                <th>Date created</th>
                                                <th>Actions</th>
                      </thead>
                      <tbody>
                        @if($auctions != null && count($auctions) > 0)
                                              @foreach($auctions as $a)
                                              <?php
                    $deal = $a['deal'];
                    $images = $deal['images'];
                         shuffle($images);
                         $ird = $images[0]['url'];
                         $imgg = "https://res.cloudinary.com/kloudtransact/image/upload/v1563645033/uploads/".$ird;
                    $du = url('deal')."?sku=".$deal['sku'];
                    $bp = "&#8358;".number_format($a['buy_price'],2);
                    $hb = "Unknown";
                    $hbb = (isset($a['hb'])) ? $a['hb'] : "no";
                    if($hbb != "no") $hb = $hbb->fname." ".$hbb->lname;
                    $eu = url('cobra-end-auction')."?xf=".$a['id'];
                    $deu = url('cobra-delete-auction')."?xf=".$a['id'];
                  ?>
                                                 <tr>
                                                  <td>
                                                  	<center>
                                <img src="{{$imgg}}" class="img img-fluid cli" style="width: 40% !important;" data-cli="{{$du}}" alt="">
                                
                                </center><br>
                                <a href="{{$du}}">{{$deal['name']}}</a>
                                                  </td>
                                                  <td>{!! $bp !!}</td>
                                                  <td>{{$a['total-bids']}}</td>
                                                  <td>
                                                    <div id="cdc-{{$a['id']}}"></div>
                                                    <script>
	                                                    nq = new Date("{{$a['ed']}}");
                                                        getcd(nq,"cdc-{{$a['id']}}");
                                                    </script>
                                                  </td>
                                                  <td>
                                                  	@if($a['status'] == "live")
                                                  	<span class="text-primary text-bold">Live</span>
                                                      @elseif($a['status'] == "ended")
                                                      <span class="text-danger text-bold">Ended</span>
                                                      @endif
                                                  </td>	
                                                  <td>{{$hb}}</td>
                                                  <td>{{$a['date']}}</td>
                                                  <td>
                                                  	@if($a['status'] == "live")
                                                  	<a href="{{$eu}}" class="btn btn-primary btn-lg">End now</a>                                                      
                                                      @endif
                                                      <a href="{{$deu}}" class="btn btn-primary btn-lg">Delete</a>
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