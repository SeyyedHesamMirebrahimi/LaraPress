<?php
Route::get('/','PanelController@dashboard')->name('panelDashboard');
Route::get('/Profile','PanelController@editProfile')->name('editProfile');
Route::post('/Profile','PanelController@editProfilePOST')->name('editProfilePOST');
 ?>
