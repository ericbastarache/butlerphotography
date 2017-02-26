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

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'index'
]);

Route::get('/shop', [
	'uses' => 'ShopController@index',
	'as' => 'shop.index'
]);

Route::get('/gallery', [
	'uses' => 'GalleryController@index',
	'as' => 'gallery'
]);

Route::get('/contact', [
	'uses' => 'HomeController@contact',
	'as' => 'contact'
]);

Route::get('/blog/{slug}', [
	'uses' => 'PostsController@blogPost',
	'as' => 'blog.post'
]);

Route::get('/blog', [
	'uses' => 'PostsController@index',
	'as' => 'blog'
]);

Route::get('/results', [
	'uses' =>'PostsController@searchPosts',
	'as' => 'search'
]);

Route::get('/cart', [
	'uses' => 'ShopController@cart',
	'as' => 'shop.cart'
]);

Route::get('/add-to-cart/{id}', [
	'uses' => 'ShopController@addToCart',
	'as' => 'shop.addToCart'
]);

Route::get('/remove/{id}', [
	'uses' => 'ShopController@remove',
	'as' => 'shop.remove'
]);

Route::get('/remove-one/{id}', [
	'uses' => 'ShopController@removeSingular',
	'as' => 'shop.removeOne'
]);

Route::get('/update/{id}', [
	'uses' => 'ShopController@updateCart',
	'as' => 'shop.update'
]);

Route::get('/checkout', [
	'uses' => 'ShopController@checkout',
	'as' => 'checkout'
]);

Route::post('/checkout', [
	'uses' => 'ShopController@postCheckout',
	'as' => 'checkout'
]);



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {


	//Get Routes
	
	Route::get('/about', [
		'uses' => 'AboutController@about',
		'as' => 'admin.about'
	]);

	Route::get('/about/edit/{id}', [
		'uses' => 'AboutController@editAbout',
		'as' => 'admin.editAbout'
	]);

	Route::get('/about/create', [
		'uses' => 'AboutController@writeAbout',
		'as' => 'admin.writeAbout'
	]);

	Route::get('/password/change', [
		'uses' => 'Auth\ResetPasswordController@showPassChange',
		'as' => 'admin.changePassword'
	]);

	Route::get('/', [
		'uses' => 'HomeController@dashboard',
		'as' => 'admin.dashboard'
	]);

	Route::get('/posts/create', [
		'uses' => 'PostsController@writePost',
		'as' => 'admin.createPost'
	]);

	Route::get('/posts/edit/{id}', [
		'uses' => 'PostsController@editPost',
		'as' => 'admin.editPost'
	]);

	Route::get('/posts/all', [
		'uses' => 'PostsController@listPosts',
		'as' => 'admin.listPosts'
	]);

	Route::get('/posts/delete/{id}', [
		'uses' => 'PostsController@deletePost',
		'as' => 'admin.deletePost'
	]);

	Route::get('/logout',[
		'uses' => 'Auth\LoginController@logout',
		'as' => 'admin.logout'
	]);

	Route::get('/gallery', [
		'uses' => 'GalleryController@listGalleries',
		'as' => 'admin.gallery'
	]);

	Route::get('/gallery/create', [
		'uses' => 'GalleryController@createGallery',
		'as' => 'admin.createGallery'
	]);

	Route::get('/gallery/update/{id}', [
		'uses' => 'GalleryController@editGallery',
		'as' => 'admin.editGallery'
	]);

	Route::get('/gallery/delete/{id}', [
		'uses' => 'GalleryController@deleteGallery',
		'as' => 'admin.deleteGallery'
	]);

	Route::get('/photos', [
		'uses' => 'PhotoController@showPhotos',
		'as' => 'admin.showPhotos'
	]);

	Route::get('/photos/upload', [
		'uses' => 'PhotoController@newPhoto',
		'as' => 'admin.newPhoto'
	]);

	Route::get('/photos/delete/{id}', [
		'uses' => 'PhotoController@deletePhoto',
		'as' => 'admin.deletePhoto'
	]);

	Route::get('/orders', [
		'uses' => 'OrdersController@index',
		'as' => 'admin.orders'
	]);

	Route::get('/orders/details/{id}', [
		'uses' =>'OrdersController@details', 
		'as' => 'admin.orderDetails'
	]);

	Route::get('/prints', [
		'uses' => 'PrintsController@index',
		'as' => 'admin.listPrints'
	]);

	Route::get('/prints/create', [
		'uses' => 'PrintsController@showCreate',
		'as' => 'admin.createPrint'
	]);

	Route::get('/prints/update/{id}', [
		'uses' => 'PrintsController@showUpdate',
		'as' => 'admin.showPrintUpdate'
	]);

	Route::get('/prints/delete/{id}', [
		'uses' => 'PrintsController@deletePrints',
		'as' => 'admin.deletePrints'
	]);


	//Post Routes
	
	Route::post('/about/create', [
		'uses' => 'AboutController@saveAbout',
		'as' => 'admin.createAbout'
	]);

	Route::post('/about/update', [
		'uses' => 'AboutController@updateAbout',
		'as' => 'admin.updateAbout'
	]);

	Route::post('/posts/create', [
		'uses' => 'PostsController@savePost',
		'as' => 'admin.createPost'
	]);

	Route::post('/gallery/create', [
		'uses' => 'GalleryController@saveGallery',
		'as' => 'admin.createGallery'
	]);

	Route::post('/gallery/update', [
		'uses' => 'GalleryController@updateGallery',
		'as' => 'admin.updateGallery'
	]);

	Route::post('/posts/edit', [
		'uses' => 'PostsController@updatePost',
		'as' => 'admin.updatePost'
	]);

	Route::post('/photos/upload', [
		'uses' => 'PhotoController@uploadPhoto',
		'as' => 'admin.newPhoto'
	]);

	Route::post('/prints/create', [
		'uses' => 'PrintsController@createPrint',
		'as' => 'admin.createPrint'
	]);

	Route::post('/prints/update', [
		'uses' => 'PrintsController@updatePrint',
		'as' => 'admin.updatePrint'
	]);

	Route::post('/password/change', [
		'uses' => 'Auth\ResetPasswordController@changePassword',
		'as' => 'admin.changePassword'
	]);
});

Auth::routes();