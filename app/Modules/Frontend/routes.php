<?php
Route::group(['middleware'=>'web','namespace'=>'App\Modules\Frontend\Controllers'],function(){
    Route::get('/',['as'=>'homepage','uses'=>'HomeController@getIndex']);

    Route::get('/gioi-thieu',['as'=>'f.getGioithieu','uses'=>'GioithieuController@getGioithieu']);
    Route::get('/thu-vien-hinh-anh', ['as' => 'f.getGallery', 'uses' => 'GalleryController@getGallery']);
    Route::post('/thu-vien-hinh-anh',['as' => 'f.postAjaxGallery', 'uses' => 'GalleryController@postAjaxGallery']);

    Route::get('/chi-nhanh/{id}', ['as' => 'f.getChinhanh', 'uses' => 'BranchController@getChinhanh'])->where('id','[0-9]+');
    Route::get('/lien-he',['as'=>'f.getLienhe','uses'=>'LienheController@getLienhe']);
    Route::post('/lien-he',['as'=>'f.postLienhe','uses'=>'LienheController@postLienhe']);
});
