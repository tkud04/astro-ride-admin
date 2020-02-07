@extends("admin.layout")

@section('title',"Withdrawals")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Withdrawals</h4>
                  <p class="card-category"> View and approve withdrawal requests</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="admin-orders-table">
                      <thead class=" text-primary">
                        <th>
                          Withdrawal #
                        </th>
                        <th>
                          User
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
                       @if($withdrawals != null && count($withdrawals) > 0)
                       @foreach($withdrawals as $w)
                       <?php
                          $approveURL = url('cobra-approve-withdrawal').'?ff='.$w['id']; 
                       ?>
                        <tr>
                          <td>
                            {{$w['id']}}
                          </td>
                          <td>
                            {{$w['user']}}
                          </td>
                          
                          <td class="text-primary">
                           &#8358;{{number_format($w['amount'],2)}}
                          </td>
                          <td class="text-warning">
                           {{$w['status']}} 
                          </td>
                          <td>
                           <a class="btn btn-primary" href=" {{$approveURL}}">Approve</a>
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