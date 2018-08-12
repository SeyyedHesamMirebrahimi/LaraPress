<?php
Route::get('/','PanelController@dashboard')->name('panelDashboard');
Route::get('/editProfile','PanelController@editProfile')->name('editProfile');
Route::post('/editProfile','PanelController@editProfilePOST')->name('editProfilePOST');
 ?>
