@extends("admin.layout")

@section('title',"Users")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Users</h4>
                  <p class="card-category"> View users, user details or enable/disable users</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="usersTable">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Role
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                         @foreach($users as $u)
                        <tr>
                          <td>
                            {{$u['id']}}
                          </td>
                          <td>
                            {{$u['fname']." ".$u['lname']}}
                          </td>
                          <td>
                            {{$u['phone']}} 
                          </td>
                          <td class="text-primary">
                           {{$u['email']}}
                          </td>
                          <td class="text-primary">
                           {{$u['role']}}
                          </td>
                          <td class="text-warning">
                           {{$u['status']}}
                          </td>
                          <td>     
                           <?php 
                             $uu = url('cobra-user').'?email='.$u['email'];
                           ?>	
                           <a class="btn btn-primary" href="{{$uu}}">View</a>
                          </td>
                        </tr>
                        @endforeach                        
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