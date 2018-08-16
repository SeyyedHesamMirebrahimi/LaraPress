<?php
Route::get('/','PanelController@dashboard')->name('panelDashboard');
Route::get('/profile','PanelController@editProfile')->name('editProfile');
Route::post('/profile','PanelController@editProfilePOST')->name('editProfilePOST');
Route::post('/updatePassword','PanelController@updatePasswordPOST')->name('updatePasswordPOST');
Route::post('/updateProfileAvatar','PanelController@updateProfileAvatarPOST')->name('updateProfileAvatarPOST');
Route::get('/addRssFeed','PanelController@addRssFeed')->name('addRssFeed');
Route::post('/addRssFeed','PanelController@addRssFeedPOST')->name('addRssFeedPOST');
Route::get('/deleteRssFeed/{id}','PanelController@deleteRssFeed')->name('deleteRssFeed');
Route::get('/RssFeeder','PanelController@RssFeeder')->name('RssFeeder');

?>
