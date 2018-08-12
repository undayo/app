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
  <div class="col-md-12">
    <div class="card mb-12 box-shadow">
      <div class="card-body">
        <h6>SALES MANAGEMENT</h6>
        <hr>
        <div class="form-group">
          <a href="" class="btn btn-primary" style="border-radius: 0px;background: #444; font-color:#FFF;border: none; margin-bottom: 4px;" data-toggle="modal" data-target="#newArrangementModal">+ New Sale</a>
          <input type="" name="" class="form-control" style="border-radius: 0px; #FFEE4533;" placeholder="Sales Search ...">
        </div>
        <table class="table">
          <thead style="background: #444; color:#FFF;">
            <tr>
            <th>Date</th>
            <th>Customer</th>
            <th>Product Qty</th>
            <th>Total Price</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($ventes as $vente)
              <tr class="text-center">
                <td>{{$vente->date}}</td>
                <td>{{$vente->client->nom}}</td>
                <td>{{$vente->nombre()}}</td>
                <td>{{$vente->montant()}}</td>
                <td> <a href="{{ url('ventes/edit',$vente->id)}}"><i class="fa fa-edit"></i></a> <a href=""><i class="fa fa-file-o"></i></a> <a href=""><i class="fa fa-trash"></i></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="newArrangementModal" tabindex="-1" role="dialog" aria-labelledby="newArrangementModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #444;">
        <h5 class="modal-title text-center" id="exampleModalLabel" style="color:#FFF;">SALES ARRANGEMENT</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('ventes/create') }}" >
          {{ csrf_field() }}
         
      <div class="form-group">
        <label name="customer">Customer</label>
        <input type="text" name="nom" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
      </div>
      <div class="form-group">
        <label name="phone">Phone Customer</label>
        <input type="text" name="phone" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
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