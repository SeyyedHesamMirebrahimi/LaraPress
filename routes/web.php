<?php
use App\Models\Articles;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');})->name('index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('ajax/users', 'AjaxContoller@getAvatarByEmail')->name('getAvatarByEmail');
Route::group(
  [
    'prefix' => 'laravel-filemanager',
   'middleware' => ['web', 'auth'],
 ], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/feeds', 'PanelController@feeds')->name('feeds');
Route::get('/apic', 'PanelController@categoryEdit');
Route::get('/some',function(){
    $items = Articles::find(1)->category;
    dd($items->name);
    foreach ($items as $item) {
        var_dump($item->name);
    }
});

