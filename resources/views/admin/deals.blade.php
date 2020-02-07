@extends("admin.layout")

@section('title',"Deals")

@section('content')
            <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Deals</h4>
                  <p class="card-category"> View, Edit or remove deals</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="dealsTable">
                      <thead class=" text-primary">
                        <th>
                          SKU
                        </th>
                        <th>
                          Name
                        </th>  
                        <th>
                          Rating
                        </th>  
                        <th>
                          Status
                        </th>  
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                        @foreach($deals as $d)
                        <tr>
                          <td>
                            {{$d['sku']}}
                          </td>
                          <td>
                            {{$d['name']}}
                          </td>
                          <td>
                            @for($u = 0; $u < $d['rating']; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-info">
                           {{$d['status']}}
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{url('cobra-deal').'?sku='.$d['sku']}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        @endforeach
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