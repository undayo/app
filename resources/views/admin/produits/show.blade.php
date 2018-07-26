@extends('layouts.app')
@section('title','Inventory Management')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-12 box-shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                <small class="text-right text-muted"><a href="{{url('/')}}">Home</a> > Inventory</small>
                </div>
            </div>
        </div>
    </div>     
</div>
<div class="row" style="margin-top: 10px;">
  <div class="col-md-12">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        <h6>INVENTORY OF PRODUCTS</h6>
        <hr style="color: #444;">
        <h1>Produits en Stock : {{$stock}}</h1>
      </div>
    </div>
  </div>
   <div class="col-md-6">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
       
        <table class="table">
          <thead style="background: #444; color:#FFF;">
            <tr>
              <th>CATEGORY</th>
              <th>NUMBER OF PRODUCTS</th>
              <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($categories as $categorie)
              <tr>
                  <td>{{$categorie->nom}} </td>
                  <td>{{$categorie->nombreProduit()}}</td>
                  <td><a href="{{url('inventaires/categories',$categorie->id)}}" class="small">Details <i class="fa fa-file-o"></i> </a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @if($item!=null)
   <div class="col-md-6">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        
        <table class="table">
          <thead style="background: #444; color:#FFF;">
            <tr>
              <th>CATEGORY : {{$item->nom}}</th>
              <th></th>
              <th>En Stock</th>
              </tr>
          </thead>
          <tbody>
            @if($item->produits())
              @foreach($item->produits as $produit)
                <tr>
                  <td><img src="{{asset('images/produits/'.$produit->image)}}" width="30" height="30"></td>
                  <td>{{$produit->nom}}</td>
                  <td>{{$produit->stock()}}</td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endif

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection