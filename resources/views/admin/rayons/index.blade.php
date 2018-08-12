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
				<h6>RAYONS MANAGEMENT</h6>
				<hr style="color: #444;">
				<div class="form-group">
					<a href="" class="btn btn-primary" style="border-radius: 0px;background: #444; font-color:#FFF;border: none; margin-bottom: 4px;" data-toggle="modal" data-target="#newRayonModal">+ New Rayon</a>
					<input type="" name="" class="form-control" style="border-radius: 0px; #FFEE4533;" placeholder="Search rayon ...">
				</div>
				<h6>Rayons List</h6>
				<table class="table">
					<thead style="background: #444; color:#FFF;">
						<tr>
						  <th>Name</th>
						  <th></th>
					    </tr>
					</thead>
					<tbody>
						@foreach($rayons as $rayon)
                        <tr>
                            <td>{{$rayon->nom}} ({{$rayon->nombre()}})</td>
                             <td><a href="{{ url('rayons/delete',$rayon->id)}}"><i class="fa fa-trash"></i></a></td>
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
				<h6>ARANGEMENT MANAGEMENT</h6>
				<hr>
				<div class="form-group">
					<input type="" name="" class="form-control" style="border-radius: 0px; #FFEE4533;" placeholder="Search product ...">
				</div>
				<h6>Rayons List</h6>
				<table class="table">
					<thead style="background: #444; color:#FFF;">
						<tr>
						  <th></th>
						  <th>Product</th>
						  <th>Ray</th>
						  <th>Rack</th>
						  <th></th>
					    </tr>
					</thead>
					<tbody>
						@foreach($produits as $produit)
                        <tr>
                        	<td><img src="{{asset('images/produits/'.$produit->image)}}" width="50" height="50"></td>
                            <td>{{$produit->nom}}</td>
                            <td>{{$produit->rayon->nom}}</td>
                            <td>{{$produit->etagere->nom}}</td>
                            <td><a href="{{ url('produits/edit',$produit->id)}}"><i class="fa fa-exchange"></i></a></td>
                        </tr>
                         @endforeach
					</tbody>
				</table>
			
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="newRayonModal" tabindex="-1" role="dialog" aria-labelledby="newRayonModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #444;">
        <h5 class="modal-title text-center" id="exampleModalLabel" style="color:#FFF;">RAY MANAGEMENT</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('rayons/create') }}" enctype="multipart/form-data">
        	{{ csrf_field() }}
			<div class="form-group">
				<label name="Produit">Ray Name</label>
				<input type="text" name="nom" class="form-control" style="border-radius: 0px;background: #EEE; font-color:#FFF;border: none;">
			</div>
			<div class="form-group">
				<label name="Produit">Location</label>
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