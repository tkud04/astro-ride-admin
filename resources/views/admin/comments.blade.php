@extends("admin.layout")

@section('title',"Comments")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Comments</h4>
                  <p class="card-category"> View, edit or remove comments</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="couponsTable">
                      <thead class=" text-primary">
                        <th>
                          User
                        </th>
                        <th>
                          Deal
                        </th> 
                        <th>
                          Comment
                        </th>  
                        <th>
                          Status
                        </th> 
						<th>
                          Date
                        </th> 
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                        @if($comments != null && count($comments) > 0)
                        @foreach($comments as $c)
				         <?php
                          $uu = url('cobra-comment').'?id='.$c['id']; 
                         ?>
                        <tr>
                          <td>
						  {{$c['user']}}
                          </td>
                          <td>
						  {{$c['deal']}}
                          </td>
                          <td>
                            {{$c['comment']}}
                          </td>
                          <td class="text-primary">
                          {{$c['status']}}
                          </td>
                          <td class="text-primary">
                          {{$c['date']}}
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{$uu}}">View</a>
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