<?php

### Gestion des routes pour les produits
Route::get('produits', 'ProduitController@index')->name('produits.index');
Route::post('produits', 'ProduitController@search')->name('produits.search');
Route::get('produits/create', 'ProduitController@create')->name('produits.create');
Route::post('produits/create', 'ProduitController@store')->name('produits.store');
Route::get('produits/edit/{id}', 'ProduitController@edit')->name('produits.edit');
Route::post('produits/edit/{id}', 'ProduitController@update')->name('produits.update');
Route::get('produits/show/{id}', 'ProduitController@show')->name('produits.show');
Route::get('produits/delete/{id}', 'ProduitController@delete')->name('produits.delete');

### Gestion des routes pour les approvisionnements
Route::get('approvisionnements', 'ApprovisionnementController@index')->name('approvisionnements.index');
Route::post('approvisionnements', 'ApprovisionnementController@search')->name('approvisionnements.search');
Route::get('approvisionnements/create', 'ApprovisionnementController@create')->name('approvisionnements.create');
Route::post('approvisionnements/create', 'ApprovisionnementController@store')->name('approvisionnements.store');
Route::get('approvisionnements/edit/{id}', 'ApprovisionnementController@edit')->name('approvisionnements.edit');
Route::post('approvisionnements/edit/{id}', 'ApprovisionnementController@update')->name('approvisionnements.update');
Route::get('approvisionnements/show/{id}', 'ApprovisionnementController@show')->name('approvisionnements.show');
Route::get('approvisionnements/delete/{id}', 'ApprovisionnementController@delete')->name('approvisionnements.delete');

### Gestion des routes pour les categories
Route::get('categories', 'CategorieController@index')->name('categories.index');
Route::post('categories', 'CategorieController@search')->name('categories.search');
Route::get('categories/create', 'CategorieController@create')->name('categories.create');
Route::post('categories/create', 'CategorieController@store')->name('categories.store');
Route::get('categories/edit/{id}', 'CategorieController@edit')->name('categories.edit');
Route::post('categories/edit/{id}', 'CategorieController@update')->name('categories.update');
Route::get('categories/show/{id}', 'CategorieController@show')->name('categories.show');
Route::get('categories/delete/{id}', 'CategorieController@delete')->name('categories.delete');

### Gestion des routes pour les clients
Route::get('clients', 'ClientController@index')->name('clients.index');
Route::post('clients', 'ClientController@searcr')->name('clients.search');
Route::get('clients/create', 'ClientController@create')->name('clients.create');
Route::post('clients/create', 'ClientController@store')->name('clients.store');
Route::get('clients/edit/{id}', 'ClientController@edit')->name('clients.edit');
Route::post('clients/edit/{id}', 'ClientController@update')->name('clients.update');
Route::get('clients/show/{id}', 'ClientController@show')->name('clients.show');
Route::get('clients/delete/{id}', 'ClientController@delete')->name('clients.delete');

### Gestion des routes pour les etageres
Route::get('etageres', 'EtagereController@index')->name('etageres.index');
Route::post('etageres', 'EtagereController@searcr')->name('etageres.search');
Route::get('etageres/create', 'EtagereController@create')->name('etageres.create');
Route::post('etageres/create', 'EtagereController@store')->name('etageres.store');
Route::get('etageres/edit/{id}', 'EtagereController@edit')->name('etageres.edit');
Route::post('etageres/edit/{id}', 'EtagereController@update')->name('etageres.update');
Route::get('etageres/show/{id}', 'EtagereController@show')->name('etageres.show');
Route::get('etageres/delete/{id}', 'EtagereController@delete')->name('etageres.delete');

### Gestion des routes pour les fournisseurs
Route::get('fournisseurs', 'FournisseurController@index')->name('fournisseurs.index');
Route::post('fournisseurs', 'FournisseurController@searcr')->name('fournisseurs.search');
Route::get('fournisseurs/create', 'FournisseurController@create')->name('fournisseurs.create');
Route::post('fournisseurs/create', 'FournisseurController@store')->name('fournisseurs.store');
Route::get('fournisseurs/edit/{id}', 'FournisseurController@edit')->name('fournisseurs.edit');
Route::post('fournisseurs/edit/{id}', 'FournisseurController@update')->name('fournisseurs.update');
Route::get('fournisseurs/show/{id}', 'FournisseurController@show')->name('fournisseurs.show');
Route::get('fournisseurs/delete/{id}', 'FournisseurController@delete')->name('fournisseurs.delete');

### Gestion des routes pour les rayons
Route::get('rayons', 'RayonController@index')->name('rayons.index');
Route::post('rayons', 'RayonController@searcr')->name('rayons.search');
Route::get('rayons/create', 'RayonController@create')->name('rayons.create');
Route::post('rayons/create', 'RayonController@store')->name('rayons.store');
Route::get('rayons/edit/{id}', 'RayonController@edit')->name('rayons.edit');
Route::post('rayons/edit/{id}', 'RayonController@update')->name('rayons.update');
Route::get('rayons/show/{id}', 'RayonController@show')->name('rayons.show');
Route::get('rayons/delete/{id}', 'RayonController@delete')->name('rayons.delete');

### Gestion des routes pour les ventes
Route::get('ventes', 'VenteController@index')->name('ventes.index');
Route::post('ventes', 'VenteController@searcr')->name('ventes.search');
Route::get('ventes/create', 'VenteController@create')->name('ventes.create');
Route::post('ventes/create', 'VenteController@store')->name('ventes.store');
Route::get('ventes/edit/{id}', 'VenteController@edit')->name('ventes.edit');
Route::post('ventes/edit/{id}', 'VenteController@update')->name('ventes.update');
Route::get('ventes/show/{id}', 'VenteController@show')->name('ventes.show');
Route::get('ventes/delete/{id}', 'VenteController@delete')->name('ventes.delete');


