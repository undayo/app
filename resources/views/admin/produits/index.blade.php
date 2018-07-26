@extends('layouts.app')
@section('title','Rayons Management')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-12 box-shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                <small class="text-right text-muted"><a href="{{url('/')}}">Home</a> > Arangement Management</small>
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
        <div class="form-group">
          <a href="" class="btn btn-primary" style="border-radius: 0px;background: #444; font-color:#FFF;border: none; margin-bottom: 4px;" data-toggle="modal" data-target="#newRayonModal">+ New Category</a>
          <input type="" name="" class="form-control" style="border-radius: 0px; #FFEE4533;" placeholder="Search category ...">
        </div>
        <h6>Category List</h6>
        <table class="table">
          <thead style="background: #444; color:#FFF;">
            <tr>
              <th>Name</th>
              <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($categories as $categorie)
              <tr>
                  <td>{{$categorie->nom}}</td>
                  <td><a href="{{ url('categories/delete/',$categorie->id)}}"><i class="fa fa-trash"></i></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        <h6>PRODUCTS MANAGEMENT</h6>
        <hr>
        <div class="form-group">
          <a href="" class="btn btn-primary" style="border-radius: 0px;background: #444; font-color:#FFF;border: none; margin-bottom: 4px;" data-toggle="modal" data-target="#newArrangementModal">+ New Product</a>
          <input type="" name="" class="form-control" style="border-radius: 0px; #FFEE4533;" placeholder="Product Search ...">
        </div>
        <h6>Product List</h6>
        <table class="table">
          <thead style="background: #444; color:#FFF;">
            <tr>
            <th></th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Location</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($produits as $produit)
              <tr class="text-center">
                <td><img src="{{asset('images/produits/'.$produit->image)}}" width="50" height="50"></td>
                <td>{{$produit->nom}}</td>
                <td>{{$produit->stock()}}</td>
                <td>{{$produit->rayon->nom}}
                  <p class="small">{{$produit->etagere->nom}}</p></td>
                <td> <a href=""><i class="fa fa-edit"></i></a> <a href=""><i class="fa fa-trash"></i></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="newRayonModal" tabindex="-1" role="dialog" aria-labelledby="newRayonModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #444;">
        <h5 class="modal-title text-center" id="exampleModalLabel" style="color:#FFF;">CATEGORY MANAGEMENT</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('categories/create') }}">
          {{ csrf_field() }}
      <div class="form-group">
        <label name="Produit">Category Name</label>
        <input type="text" name="nom" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
      </div>
     
      
      <div class="form-group">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;background: orange; font-color:#FFF;border: none;">CLOSE</button>
       <input type="submit"  class="btn btn-primary" value="SAVE" style="border-radius: 0px;background: #444; font-color:#FFF;border: none;">
        </div>
    </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="newArrangementModal" tabindex="-1" role="dialog" aria-labelledby="newArrangementModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #444;">
        <h5 class="modal-title text-center" id="exampleModalLabel" style="color:#FFF;">PRODUCT ARRANGEMENT</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('produits/create') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
        <label name="Produit">Name</label>
        <input type="text" name="nom" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
      </div>
      <div class="form-group">
        <label name="Produit">Price</label>
        <input type="text" name="prix" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
      </div>
      <div class="form-group">
        <label name="Categorie">Category</label>
        <select name="categorie" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
            @foreach($categories as $categorie)
            <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label name="Produit">Etagere</label>
          <select name="etagere" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
          @foreach($etageres as $etagere)
            <option value="{{$etagere->id}}">{{$etagere->nom}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label name="Produit">Picture</label>
        <input type="file" name="image" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
      </div>

      <div class="form-group">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;background: orange; font-color:#FFF;border: none;">CLOSE</button>
       <input type="submit"  class="btn btn-primary" value="SAVE" style="border-radius: 0px;background: #444; font-color:#FFF;border: none;">
        </div>
    </form>
      </div>
      
    </div>
  </div>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection