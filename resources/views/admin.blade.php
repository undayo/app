@extends('layouts.app')
@section('title','Panel Administration')
@section('content')
<div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <h4 class="text-center" style="margin-top: 20px;">Inventory</h4>
                <h6 class="text-center" style="margin-top: 10px;">1209</h6>
                <div class="card-body">
                  <p class="card-text text-center" style="font-size:100px;">
                  	<i class="fa fa-exchange"></i>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-right text-muted"><a href="{{ url('inventaires')}}">Manage</a></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <h4 class="text-center" style="margin-top: 20px;">Procurement</h4>
                <h6 class="text-center" style="margin-top: 10px;">89</h6>
                <div class="card-body">
                  <p class="card-text text-center" style="font-size:100px;">
                  	<i class="fa fa-database"></i>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-right text-muted"><a href="{{ url('approvisionnements')}}">Manage</a></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <h4 class="text-center" style="margin-top: 20px;">Products</h4>
                <h6 class="text-center" style="margin-top: 10px;">8</h6>
                <div class="card-body">
                  <p class="card-text text-center" style="font-size:100px;">
                  	<i class="fa fa-pie-chart"></i>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-right text-muted"><a href="{{ url('produits')}}">Manage</a></small>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <h4 class="text-center" style="margin-top: 20px;">Arrangement</h4>
                <h6 class="text-center" style="margin-top: 10px;">1209</h6>
                <div class="card-body">
                  <p class="card-text text-center" style="font-size:100px;">
                  	<i class="fa fa-codepen"></i>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-right text-muted"><a href="{{ url('rayons')}}">Manage</a></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <h4 class="text-center" style="margin-top: 20px;">Sales</h4>
                <h6 class="text-center" style="margin-top: 10px;">1209</h6>
                <div class="card-body">
                  <p class="card-text text-center" style="font-size:100px;">
                  	<i class="fa fa-google-wallet"></i>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-right text-muted"><a href="{{ url('ventes')}}">Manage</a></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <h4 class="text-center" style="margin-top: 20px;">Parameters</h4>
                <h6 class="text-center" style="margin-top: 10px;">1209</h6>
                <div class="card-body">
                  <p class="card-text text-center" style="font-size:100px;">
                  	<i class="fa fa-gears"></i>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-right text-muted"><a href="">Manage</a></small>
                  </div>
                </div>
              </div>
            </div>

           
@endsection