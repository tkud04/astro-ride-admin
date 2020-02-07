@extends("admin.blank-layout")

@section('title',"Invoice")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-5">
          	<div class="col-md-6">
          	   <h2>KloudTransact Invoice KINV45952468</h2>
              </div>
              <div class="col-md-3">
              	
              </div>
              <div class="col-md-3">
              	<h4 class="pull-right">
              	  <strong>Invoice</strong> KINV45952468<br>
                    <strong>Invoice Date</strong> 22 May, 2019<br>
                    <strong>Due Date</strong> 22 May, 2019
                  </h4>
              </div>
          </div>
          <div class="row mt-5">
          	<div class="col-md-4">
          	   <h4 class="pull-left">
              	  <strong>To</strong> King Perry<br>
                    <strong>147 Trans Amadi Industrial Layout</strong><br>
                    <strong>Port-Harcourt</strong><br>
                    <strong>Rivers State</strong><br>
                  </h4>
              </div>
              <div class="col-md-4">
              	<center>
              	  <h4> <strong>From: KloudTransact Ltd.</strong></h4><br>
                  </center>
              </div>
              <div class="col-md-4">
              	<h4 class="pull-right">
              	  <strong>Status: </strong><span class="badge badge-danger">UNPAID</span><br>
                    <strong>Balance: </strong><span class="badge badge-succesd">&#8358;47,000.00</span><br>
                  </h4>
              </div>
          </div><br>
          <div class="row mt-5">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Invoice Details</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Description
                        </th>
                        <th>
                          Taxed? 
                        </th>
                        <th>
                          Unit cost
                        </th>
                        <th>
                          Qty
                        </th>
                        <th>
                          Price
                        </th>
                        
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <strong>Samsung 40-inch LED TV - Bluetooth WiF,i</strong>
                          </td>
                          <td>
                            No
                          </td>
                          <td>
                            &#8358;45,000.00
                          </td>
                          <td>
                            1 
                          </td>
                          <td class="text-primary">
                           &#8358;45,000
                          </td>                     
                        </tr>         
                        <tr>
                          <td>
                            
                          </td>
                          <td>
                            
                          </td>
                          <td>
                            <strong>Sub-total</strong>
                          </td>
                          <td>
                            
                          </td>
                          <td class="text-primary">
                           &#8358;45,000
                          </td>                     
                        </tr>
                        <tr>
                          <td>
                            
                          </td>
                          <td>
                            
                          </td>
                          <td>
                            <strong>Delivery fee</strong>
                          </td>
                          <td>
                            
                          </td>
                          <td class="text-primary">
                           &#8358;2,000
                          </td>                     
                        </tr>
                        <tr style="border-top: 2px solid !important;">
                          <td>
                            
                          </td>
                          <td>
                            
                          </td>
                          <td>
                            <strong>Total</strong>
                          </td>
                          <td>
                            
                          </td>
                          <td class="text-primary">
                           &#8358;47,000
                          </td>                     
                        </tr>
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