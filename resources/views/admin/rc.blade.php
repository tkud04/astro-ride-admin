@extends("admin.layout")

@section('title',"Ratings/Comments")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Ratings</h4>
                  <p class="card-category"> View, edit or remove deal ratings</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="ratingsTable">
                      <thead class=" text-primary">
                        <th>
                          Deal
                        </th>
                        <th>
                          Rating
                        </th>
                        <th>
                          User
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
					    @if($ratings != null && count($ratings) > 0)
                        @foreach($ratings as $r)
				         <?php
                          $approveURL = url('cobra-mr').'?ax=jl&id='.$r['id']; 
                          $rejectURL = url('cobra-mr').'?ax=lj&id='.$r['id']; 

                          $uu = $approveURL; 
                          $ss = "success";
                          $tt = "Approve";
                          
                          if($r['status'] == "approved"){
                           $uu = $rejectURL;
                           $ss = "warning";
                           $tt = "Reject";
                         }
                         ?>
                        <tr>
                          <td>
						  {{$r['deal']}}
                          </td>
                          <td>
                            @for($u = 0; $u < $r['rating']; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
						  <td>
						  {{$r['user']}}
                          </td>
                          <td class="text-primary">
                          {{$r['status']}}
                          </td>
                          <td>
						  {{$r['date']}}
                          </td>
                          <td>
                           <a class="btn btn-{{$ss}}" href="{{$uu}}">{{$tt}}</a>
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
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Comments</h4>
                  <p class="card-category"> View, edit or remove deal comments</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="commentsTable">
                      <thead class=" text-primary">
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
						  {{$c['deal']}}
                          </td>
                          <td>
                            {{$c['comment']}}
                          </td>
                          <td class="text-primary">
                          {{$c['status']}}
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