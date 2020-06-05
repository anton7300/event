<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth.admin'], function () {
    Route::resource('/interest', 'InterestController');

    Route::resource('/interest-cat', 'InterestCatController');

    Route::resource('/banner', 'BannerController');
});