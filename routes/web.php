<?php

Route::get('/', 'FrontController@index')->name('index');
Route::get('/detail/{id}', 'FrontController@detail')->name('detail');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
// Resources
Route::resource('city','CityController');
Route::resource('flat','FlatController');
Route::resource('region','RegionController');
Route::resource('gallery','GalleryController');
Route::resource('photo','PhotoController');
Route::resource('inventory','InventoryController');

// Flats
Route::prefix('flat')->middleware('auth:web')->group(function() {
    Route::get('/', 'FlatController@index')->name('flat.index');
    Route::post('/deleteFlat', 'FlatController@deleteFlat')->name('flat.deleteFlat');
    Route::post('/ajax-regions', 'FlatController@ajaxRegions')->name('flat.ajax-regions');


});
// Gallery
Route::prefix('gallery')->middleware('auth:web')->group(function() {
    Route::get('/', 'GalleryController@index')->name('gallery.index');
    Route::get('/galleryIndex/{id}', 'GalleryController@galleryIndex')->name('galleryIndex');
    Route::post('/delete', 'GalleryController@deleteGallery')->name('gallery.delete');
    Route::post('/{id}', 'GalleryController@updateGallery')->name('updateGallery');
});
// Photos
Route::prefix('photo')->middleware('auth:web')->group(function() {
    Route::get('/', 'PhotoController@index')->name('photo.index');
    Route::get('/photoIndex/{id}', 'PhotoController@photoIndex')->name('photoIndex');
    Route::post('/delete', 'PhotoController@deletePhoto')->name('photo.delete');
    Route::post('/{id}', 'PhotoController@updatePhoto')->name('updatePhoto');
});
// Cities
Route::prefix('city')->middleware('auth:web')->group(function() {
    Route::get('/', 'CityController@index')->name('city.index');
    Route::post('/deleteCity', 'CityController@deleteCity')->name('city.deleteCity');
    Route::post('/{id}', 'CityController@updateCity')->name('city.updateCity');
});

// Regions
Route::prefix('region')->middleware('auth:web')->group(function() {
    Route::get('/', 'RegionController@index')->name('region.index');
    Route::post('/deleteRegion', 'RegionController@deleteRegion')->name('region.deleteRegion');
    Route::post('/{id}', 'RegionController@updateRegion')->name('region.updateRegion');
});
// Inventory
Route::prefix('inventory')->middleware('auth:web')->group(function() {
    Route::get('/', 'InventoryController@index')->name('inventory.index');
    Route::post('/deleteInventory', 'InventoryController@deleteInventory')->name('inventory.deleteInventory');
    Route::post('/{id}', 'InventoryController@updateInventory')->name('inventory.updateInventory');
});
// search
Route::post('/search','FrontController@search')->name('search');
