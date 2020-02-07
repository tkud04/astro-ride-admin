@extends('layout')

@section('title',"Dashboard")

@section('content')
 <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>{{$user->fname." ".$user->lname}}</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
			   <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Users List</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">FIRST NAME.</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">ACCT NUMBER</th>
                                    <th scope="col">ACCT BALANCE</th>
                                    <th scope="col">DATE CREATED</th>
                                </tr>
                            </thead>
                            <tbody>
							    @foreach($accounts as $a)
								<?php
								 $bank = $a['bank'];
								 $data = $a['data'];
								 $balance = (float)$bank['balance'];
								?>
                                <tr>
                                    <th scope="row"><b>{{$a['id']}}</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>{{$a['status']}}
                                    </td>
                                    <td><b>{{$a['fname']}}</b></td>
                                    <td><b>{{$a['lname']}}</b></td>
                                    <td><b>{{$a['email']}}</b></td>                                    
                                    <td><b>{{$a['phone']}}</b></td>                                    
                                    <td><b>{{$bank['acnum']}}</b></td>                                    
                                    <td><b>${{number_format($balance,2)}}</b></td>                                    
                                    <td><b>{{$a['date']}}</b></td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
@stop