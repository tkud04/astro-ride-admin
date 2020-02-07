@extends("admin.layout")

@section('title',"Orders")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Orders</h4>
                  <p class="card-category"> View orders, edit order details or remove orders</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="ordersTable">
                      <thead class=" text-primary">
                        <th>
                          S/N
                        </th>
                        <th>
                          User
                        </th>
                        <th>
                          Date
                        </th>
						<th>
                          Order #
                        </th>
                        <th>
                          Amount
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                       @if($orders != null && count($orders) > 0)
                       @foreach($orders as $o)
                       <?php
                          $orderURL = url('cobra-order').'?on='.$o['number']; 
                       ?>
                        <tr>
                          <td>
                            {{$o['id']}}
                          </td>
                          <td>
                            {{$o['email']}}
                          </td>
						  <td>
                            {{$o['date']}}
                          </td>
                          <td>
                            {{$o['number']}}
                          </td>
                          
                          <td class="text-primary">
                           &#8358;{{number_format($o['total'],2)}}
                          </td>
                          <td class="text-warning">
						  {{$o['status']}}
                          </td>
                          <td>
                           <a class="btn btn-primary" href=" {{$orderURL}}">View</a>
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