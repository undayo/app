@extends('layouts.app')
@section('title','Product Arrangement Management')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-12 box-shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                <small class="text-right text-muted"><a href="{{url('/')}}">Home</a> > <a href="{{ url('rayons')}}">Arangement Management</a> > Change Location of Product</small>
                </div>
            </div>
        </div>
    </div>     
</div>
<div class="row" style="margin-top: 10px;">
  <div class="col-md-5">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        <h6>PRODUCTS MANAGEMENT</h6>
        <hr style="color: #444;">
        <form method="POST" action="{{ url('produits/edit',$produit->id) }}">
          {{ csrf_field() }}
          <div class="form-group">
        <label name="Produit">Name</label>
        <input type="text" name="nom" class="form-control" value="{{$produit->nom}}" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
      </div>
     
      <div class="form-group">
        <label name="Rayon">Ray</label>
        <select name="rayon" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
            <option value="{{$produit->rayon_id}}" selected="selected">{{$produit->rayon->nom}}</option>
            @foreach($rayons as $rayon)
             @if($rayon->id != $produit->rayon_id)
               <option value="{{$rayon->id}}">{{$rayon->nom}}</option>
             @endif
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label name="Etagere">Rack</label>
        <select name="etagere" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
          <option value="{{$produit->etagere_id}}" selected="selected">{{$produit->etagere->nom}}</option>
            @foreach($etageres as $etagere)
             @if($etagere->id != $produit->etagere_id)
               <option value="{{$etagere->id}}">{{$etagere->nom}}</option>
             @endif
            @endforeach
        </select>
      </div>
    

      <div class="form-group">
         <a href="{{url('rayons')}}" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;background: orange; font-color:#FFF;border: none;">CANCEL</a>
       <input type="submit"  class="btn btn-primary" value="UPDATE" style="border-radius: 0px;background: #444; font-color:#FFF;border: none;">
        </div>
    </form>
    </div>
  </div>
  
</div>
<div class="col-md-7">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        
      </div>
    </div>
  </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection