<?php
Route::group(['middleware'=>'web','namespace'=>'App\Modules\Frontend\Controllers'],function(){
    Route::get('/',['as'=>'homepage','uses'=>'HomeController@getIndex']);

    Route::get('/gioi-thieu',['as'=>'f.getGioithieu','uses'=>'GioithieuController@getGioithieu']);

    Route::get('/chi-nhanh', ['as' => 'f.getChinhanh', 'uses' => 'BranchController@getChinhanh']);
    Route::get('/lien-he',['as'=>'f.getLienhe','uses'=>'LienheController@getLienhe']);
    Route::post('/lien-he',['as'=>'f.postLienhe','uses'=>'LienheController@postLienhe']);
});
