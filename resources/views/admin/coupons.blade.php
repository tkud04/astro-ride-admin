@extends("admin.layout")

@section('title',"Coupons")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Coupons</h4>
                  <p class="card-category"> View, edit or remove coupons</p>
                </div>
                <div class="card-body">
                	<a href="{{url('cobra-add-coupon')}}" class="btn btn-primary btn-lg">Add New Coupon</a>
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="couponsTable">
                      <thead class=" text-primary">
                        <th>
                          Coupon
                        </th>
                        <th>
                          Discount
                        </th>  
                        <th>
                          Status
                        </th>  
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                        @if($coupons != null && count($coupons) > 0)
                        @foreach($coupons as $c)
				         <?php
                          $viewURL = url('cobra-coupon').'?&xf='.$c['id']; 
                         ?>
                        <tr>
                          <td>
						  {{$c['code']}}
                          </td>
						  <td>
						  {{$c['discount']}}%
                          </td>
                          <td class="text-success">
                          {{$r['status']}}
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{$viewURL}}">View</a>
                          </td>
                        </tr>
						@endforeach
                        @endif
                      </tbody>
                    </table>
                  </div><br>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop