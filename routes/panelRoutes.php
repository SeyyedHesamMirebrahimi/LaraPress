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
//Articles



//Articles

//Category
Route::get('/Category','PanelController@categoryList')->name('categoryList');
Route::get('/Category/add','PanelController@categoryAdd')->name('categoryAdd');
Route::post('/Category/add','PanelController@categoryAddPOST')->name('categoryAddPOST');
Route::post('/Category','PanelController@categoryList')->name('categoryList');
Route::get('/Category/edit/{id}','PanelController@categoryEdit')->name('categoryEdit');
Route::post('/Category/edit/{id}','PanelController@categoryEditPOST')->name('categoryEditPOST');
Route::get('/Category/delete/{id}','PanelController@categoryDelete')->name('categoryDelete');
//Category

Route::get('/Articles/add','PanelController@articleAdd')->name('articleAdd');
Route::post('/Articles/add','PanelController@articleAddPOST')->name('articleAddPOST');
Route::get('/Articles','PanelController@articlesList')->name('articlesList');
Route::get('/Articles/delete/{id}','PanelController@articlesDelete')->name('articlesDelete');
Route::get('/Articles/edit/{id}','PanelController@articlesEdit')->name('articlesEdit');
Route::post('/Articles/edit/{id}','PanelController@articlesEditPOST')->name('articlesEditPOST');
?>
