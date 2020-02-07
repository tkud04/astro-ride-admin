@extends("admin.layout")

@section('title',"Transactions")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Transactions</h4>
                  <p class="card-category"> View all user transactions</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="admin-transactions-table">
                      <thead class=" text-primary">
                        <th>User</th>
                                                <th>Type</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <td>Date</td>
                      </thead>
                      <tbody>
                        @if($transactions != null && count($transactions) > 0)
                                              @foreach($transactions as $t)
                                                 <tr>
                                                  <td>{{$t['email']}}</td>
                                                  <td><span class="badge {{$t['badgeClass']}} text-uppercase">{{$t['type']}}</span></td>
                                                  <td>{!! $t['description'] !!}</td>
                                                  <td>&#8358;{{number_format($t['amount'],2)}}</td>
                                                  <td>{{$t['date']}}</td>
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