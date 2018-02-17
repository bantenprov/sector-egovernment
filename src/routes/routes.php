<?php

Route::group(['prefix' => 'sector-egovernment', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\SectorEgovernment\Http\Controllers\SectorEgovernmentController@index',
        'create'     => 'Bantenprov\SectorEgovernment\Http\Controllers\SectorEgovernmentController@create',
        'store'     => 'Bantenprov\SectorEgovernment\Http\Controllers\SectorEgovernmentController@store',
        'show'      => 'Bantenprov\SectorEgovernment\Http\Controllers\SectorEgovernmentController@show',
        'update'    => 'Bantenprov\SectorEgovernment\Http\Controllers\SectorEgovernmentController@update',
        'destroy'   => 'Bantenprov\SectorEgovernment\Http\Controllers\SectorEgovernmentController@destroy',
    ];

    Route::get('/',$controllers->index)->name('sector-egovernment.index');
    Route::get('/create',$controllers->create)->name('sector-egovernment.create');
    Route::post('/store',$controllers->store)->name('sector-egovernment.store');
    Route::get('/{id}',$controllers->show)->name('sector-egovernment.show');
    Route::put('/{id}/update',$controllers->update)->name('sector-egovernment.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('sector-egovernment.destroy');

});

