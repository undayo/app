@extends('layouts.app')
@section('title','Procurement Management')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-12 box-shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                <small class="text-right text-muted"><a href="{{url('/')}}">Home</a> > <a href="{{url('approvisionnements')}}">Procurement Management</a> > Step 2</small>
                </div>
            </div>
        </div>
    </div>     
</div>
<div class="row" style="margin-top: 10px;">
  <div class="col-md-5">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        <h6>PROCUREMENT MANAGEMENT</h6>
        <hr style="color: #444;">
   
         <div class="modal-body">
        <form method="POST" action="{{ url('approvisionnements/edit',$approvisionnement->id) }}" >
          {{ csrf_field() }}
          <input type="hidden" name="approvisionnement" value="{{$approvisionnement->id}}">
         
      <div class="form-group">
        <label name="produit">Product</label>
        <select name="produit" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
            @foreach($produits as $produit)
            <option value="{{$produit->id}}">{{$produit->nom}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label name="quantite">Quantity</label>
        <input type="number" name="quantite" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
      </div>

      <div class="form-group">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;background: orange; font-color:#FFF;border: none;">CANCEL</button>
       <input type="submit"  class="btn btn-primary" value="ADD PRODUCT" style="border-radius: 0px;background: #444; font-color:#FFF;border: none;">
        </div>
    </form>
      </div>
        
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        <h6>PROCUREMENT DETAILS</h6>
        <hr>
        
        <h3>PROCUREMENT # {{$approvisionnement->id}}</h3>
        <h6>Provider : {{$approvisionnement->fournisseur->nom}}</h6>
        <h6>Date : {{$approvisionnement->date}}</h6>
        <hr>
       <h6>Product List</h6>
        <table class="table">
          <thead style="background: #444; color:#FFF;">
            <tr>
            <th></th>
            <th>Product</th>
            <th>Quantity</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
           @if($approvisionnement->entrees())
             @foreach($approvisionnement->entrees as $entree)
              <tr>
                <td><img src="{{asset('images/produits/'.$entree->produit->image)}}" width="50" height="50"></td>
                <td>{{$entree->produit->nom}}</td>
                <td>{{$entree->quantite}}</td>
                <td><a href="{{url('entrees/delete',$entree->id)}}"> <i class="fa fa-trash"></i></a></td>
              </tr>
             @endforeach
           @endif
          </tbody>
        </table>
        <div class="form-group">
         <a href="{{ url('approvisionnements/cancel',$approvisionnement->id)}}" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;background: red; font-color:#FFF;border: none;">CANCEL PROCUREMENT</a>
       <a href="{{url('approvisionnements')}}" class="btn btn-primary" style="border-radius: 0px;background: green; font-color:#FFF;border: none;">VALIDATE</a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection