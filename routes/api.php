<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Use App\Produit;
Use App\Categorie;
Use App\Rayon;
Use App\Etagere;
 
Route::get('produits', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    $results = Produit::all();

    foreach ($results as $result) {
        $data[] = array(
            'id'=> $result->id,
            'nom'=>$result->nom,
            'image'=>$result->image,
            'categorie'=>$result->categorie->nom,
            'rayon'=>$result->rayon->nom,
            'etagere'=>$result->etagere->nom,
            'localisation'=>$result->rayon->image,
            'stock'=>$result->stock(),
            'prix'=>$result->prix
        );
    }
    return $data;
});

Route::get('categories', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    $results = Categorie::all();

    foreach ($results as $result) {
        $data[] = array(
            'id'=> $result->id,
            'nom'=>$result->nom,
        );
    }
    return $data;
});

Route::get('produits/{id}', function($id) {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    $result = Produit::FindOrFail($id);
   
        $data[] = array(
            'id'=> $id,
            'nom'=>$result->nom,
            'image'=>$result->image,
            'categorie'=>$result->categorie->nom,
            'rayon'=>$result->rayon->nom,
            'etagere'=>$result->etagere->nom,
            'localisation'=>$result->rayon->image,
            'stock'=>$result->stock(),
            'prix'=>$result->prix
        );
    
    return $data;
    
});



Route::get('produits/{slug}', function($slug) {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    $results = Produit::where('nom','LIKE','%'.$slug.'%')->get();
    foreach ($results as $result) {
        $data[] = array(
            'id'=> $result->id,
            'nom'=>$result->nom,
            'image'=>$result->image,
            'categorie'=>$result->categorie->nom,
            'rayon'=>$result->rayon->nom,
            'etagere'=>$result->etagere->nom,
            'localisation'=>$result->rayon->image,
            'stock'=>$result->stock(),
            'prix'=>$result->prix
        );
    }
    return $data;
});

Route::get('produits/detail/{id}', function($id) {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    $result = Produit::FindOrFail($id);
   
        $data[] = array(
            'id'=> $id,
            'nom'=>$result->nom,
            'image'=>$result->image,
            'categorie'=>$result->categorie->nom,
            'rayon'=>$result->rayon->nom,
            'etagere'=>$result->etagere->nom,
            'localisation'=>$result->rayon->image,
            'stock'=>$result->stock(),
            'prix'=>$result->prix
        );
    
    return $data;
});
