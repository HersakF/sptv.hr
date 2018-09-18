<?php

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

/* AUTH ROUTES */
Auth::routes();

/* CMS ROUTES */
Route::get('cms/users/get-item-info', 'UsersController@getItemInfo');

Route::post('cms/widgets/set-visibility/{id}', 'WidgetsController@setVisibility');
Route::post('cms/widgets/sort-items', 'WidgetsController@sortItems');
Route::get('cms/widgets/get-item-info', 'WidgetsController@getItemInfo');

Route::post('cms/photos/sort-items', 'PhotosController@sortItems');
Route::get('cms/photos/get-item-info', 'PhotosController@getItemInfo');

Route::get('cms/carousels/get-item-info', 'CarouselsController@getItemInfo');
Route::post('cms/carousels/set-visibility/{id}', 'CarouselsController@setVisibility');
Route::get('cms/carousels-fragments/get-item-info', 'CarouselsFragmentsController@getItemInfo');
Route::post('cms/carousels-fragments/sort-items', 'CarouselsFragmentsController@sortItems');
Route::post('cms/carousels-fragments/set-visibility/{id}', 'CarouselsFragmentsController@setVisibility');

Route::get('cms/galleries/get-item-info', 'GalleriesController@getItemInfo');
Route::post('cms/galleries/set-visibility/{id}', 'GalleriesController@setVisibility');
Route::post('cms/galleries-fragments/sort-items', 'GalleriesFragmentsController@sortItems');
Route::get('cms/galleries-fragments/get-item-info', 'GalleriesFragmentsController@getItemInfo');
Route::post('cms/galleries-fragments/set-visibility/{id}', 'GalleriesFragmentsController@setVisibility');

Route::post('cms/videos/set-visibility/{id}', 'VideosController@setVisibility');
Route::post('cms/videos/sort-items', 'VideosController@sortItems');
Route::get('cms/videos/get-item-info', 'VideosController@getItemInfo');

Route::post('cms/files/set-visibility/{id}', 'FilesController@setVisibility');
Route::post('cms/files/sort-items', 'FilesController@sortItems');
Route::get('cms/files/get-item-info', 'FilesController@getItemInfo');

Route::post('cms/locations/set-visibility/{id}', 'LocationsController@setVisibility');
Route::post('cms/locations/sort-items', 'LocationsController@sortItems');
Route::get('cms/locations/get-item-info', 'LocationsController@getItemInfo');

Route::post('cms/partners/set-visibility/{id}', 'PartnersController@setVisibility');
Route::post('cms/partners/sort-items', 'PartnersController@sortItems');
Route::get('cms/partners/get-item-info', 'PartnersController@getItemInfo');

Route::post('cms/marketings/set-visibility/{id}', 'MarketingsController@setVisibility');
Route::post('cms/marketings/sort-items', 'MarketingsController@sortItems');
Route::get('cms/marketings/get-item-info', 'MarketingsController@getItemInfo');

Route::post('cms/schedules/set-visibility/{id}', 'SchedulesController@setVisibility');
Route::get('cms/schedules/get-item-info', 'SchedulesController@getItemInfo');

Route::post('cms/widgets/set-visibility/{id}', 'WidgetsController@setVisibility');
Route::post('cms/widgets/sort-items', 'WidgetsController@sortItems');
Route::get('cms/widgets/get-item-info', 'WidgetsController@getItemInfo');

Route::post('cms/pages/sort-items', 'PagesController@sortItems');
Route::post('cms/pages/set-visibility/{id}', 'PagesController@setVisibility');
Route::post('cms/pages/set-sortability/{id}', 'PagesController@setSortability');
Route::post('cms/pages/set-navigation/{id}', 'PagesController@setNavigation');
Route::post('cms/pages/set-multiplicity/{id}', 'PagesController@setMultiplicity');
Route::post('cms/pages/set-removability/{id}', 'PagesController@setRemovability');
Route::get('cms/pages/subpages/{id}', 'PagesController@subIndex');

Route::resource('cms/dashboard', 'DashboardController', ['only' => ['index']]);
Route::resource('cms/users', 'UsersController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/widgets', 'WidgetsController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
Route::resource('cms/photos', 'PhotosController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/carousels', 'CarouselsController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
Route::resource('cms/carousels-fragments', 'CarouselsFragmentsController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/galleries', 'GalleriesController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
Route::resource('cms/galleries-fragments', 'GalleriesFragmentsController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/videos', 'VideosController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/files', 'FilesController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/locations', 'LocationsController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/partners', 'PartnersController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/schedules', 'SchedulesController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/marketings', 'MarketingsController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cms/pages', 'PagesController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
Route::resource('cms/widgets', 'WidgetsController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);

/* APP ROUTES */
Route::get('/', 'PageController@index');
Route::get('/{url}', 'PageController@getPage')->where('url','.+');
Route::post('/send-inquiry', 'PageController@sendInquiry');
