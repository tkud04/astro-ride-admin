@extends("admin.layout")

@section('title',"Fund Wallet")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Fund Wallet</h4>
                  <p class="card-category">Add to or remove funds from any KloudPay wallet</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('cobra-fund-wallet')}}">
                  	{!! csrf_field() !!}
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Account E-mail</label>
                          <input type="text" name="xf" class="form-control" value="{{$em}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Action</label>
                          <select class="form-control" name="type">
                          	<option value="none"selected="selected">What do you want to do? </option>
                              <option value="add">Add funds to this wallet</option>
                              <option value="remove">Remove funds from this account</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Amount</label>
                          <input type="number" class="form-control" name="amount">
                        </div>
                      </div>
                    </div>                    
                    
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
@stop