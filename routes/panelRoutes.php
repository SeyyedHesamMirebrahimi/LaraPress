<?php
Route::get('/','PanelController@dashboard')->name('panelDashboard');
Route::get('/profile','PanelController@editProfile')->name('editProfile');
Route::post('/profile','PanelController@editProfilePOST')->name('editProfilePOST');
Route::post('/updatePassword','PanelController@updatePasswordPOST')->name('updatePasswordPOST');
Route::post('/updateProfileAvatar','PanelController@updateProfileAvatarPOST')->name('updateProfileAvatarPOST');
 ?>
