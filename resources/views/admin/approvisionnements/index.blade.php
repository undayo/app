@extends('layouts.app')
@section('title','Procurement Management')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-12 box-shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                <small class="text-right text-muted"><a href="{{url('/')}}">Home</a> > Procurement Management</small>
                </div>
            </div>
        </div>
    </div>     
</div>
<div class="row" style="margin-top: 10px;">
  <div class="col-md-5">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        <h6>PROVIDER MANAGEMENT</h6>
        <hr style="color: #444;">
        <div class="form-group">
          <a href="" class="btn btn-primary" style="border-radius: 0px;background: #444; font-color:#FFF;border: none; margin-bottom: 4px;" data-toggle="modal" data-target="#newRayonModal">+ New Provider</a>
          <input type="" name="" class="form-control" style="border-radius: 0px; #FFEE4533;" placeholder="Search Provider ...">
        </div>
        <h6>Provider List</h6>
        <table class="table">
          <thead style="background: #444; color:#FFF;">
            <tr>
              <th>Name</th>
              <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($fournisseurs as $fournisseur)
              <tr>
                  <td>{{$fournisseur->nom}}</td>
                  <td><a href="{{ url('fournisseurs/delete/',$fournisseur->id)}}"><i class="fa fa-trash"></i></a></td>
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
        <h6>PROCUREMENT MANAGEMENT</h6>
        <hr>
        <div class="form-group">
          <a href="" class="btn btn-primary" style="border-radius: 0px;background: #444; font-color:#FFF;border: none; margin-bottom: 4px;" data-toggle="modal" data-target="#newArrangementModal">+ New Procurement</a>
          <input type="" name="" class="form-control" style="border-radius: 0px; #FFEE4533;" placeholder="Procurment Search ...">
        </div>
        <h6>Product List</h6>
        <table class="table">
          <thead style="background: #444; color:#FFF;">
            <tr>
            <th>Date</th>
            <th>Provider</th>
            <th>Product Qty</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($approvisionnements as $approvisionnement)
              <tr class="text-center">
                <td>{{$approvisionnement->date}}</td>
                <td>{{$approvisionnement->fournisseur->nom}}</td>
                <td>{{$approvisionnement->produitQte()}}</td>
                <td> <a href="{{ url('approvisionnements/edit',$approvisionnement->id)}}"><i class="fa fa-edit"></i></a> <a href=""><i class="fa fa-file-o"></i></a> <a href=""><i class="fa fa-trash"></i></a></td>
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
        <h5 class="modal-title text-center" id="exampleModalLabel" style="color:#FFF;">PROVIDER MANAGEMENT</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('fournisseurs/create') }}">
          {{ csrf_field() }}
      <div class="form-group">
        <label name="approvisionnement">Name</label>
        <input type="text" name="nom" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
      </div>
      <div class="form-group">
        <label name="approvisionnement">Phone </label>
        <input type="text" name="phone" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
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
        <h5 class="modal-title text-center" id="exampleModalLabel" style="color:#FFF;">PROCURMENT ARRANGEMENT</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('approvisionnements/create') }}" >
          {{ csrf_field() }}
         
      <div class="form-group">
        <label name="fournisseur">Provider</label>
        <select name="fournisseur" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
            @foreach($fournisseurs as $fournisseur)
            <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;background: orange; font-color:#FFF;border: none;">CLOSE</button>
       <input type="submit"  class="btn btn-primary" value="NEXT" style="border-radius: 0px;background: #444; font-color:#FFF;border: none;">
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