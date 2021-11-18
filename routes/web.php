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

/**
 *  BACK-END
 */
Route::group(['prefix' => 'admin', 'middleware' =>'auth'], function() {
	
	//Quản lý danh mục sản phẩm (Category)
	Route::group(['prefix' => 'categories'], function() {
		Route::get('/index',[
			'as' => 'categories.index',
			'uses' => 'CategoryController@index',
			'middleware' => 'can:category-list'
		]);
		Route::get('/create',[
			'as' => 'categories.create',
			'uses' => 'CategoryController@create',
			'middleware' => 'can:category-add'
		]);
		Route::post('/store',[
			'as' => 'categories.store',
			'uses' => 'CategoryController@store'
		]);
		Route::get('/edit/{id}',[
			'as' => 'categories.edit',
			'uses' => 'CategoryController@edit',
			'middleware' => 'can:category-edit'
		]);
		Route::post('/update/{id}',[
			'as' => 'categories.update',
			'uses' => 'CategoryController@update'
		]);
		Route::get('/delete/{id}',[
			'as' => 'categories.destroy',
			'uses' => 'CategoryController@destroy',
			'middleware' => 'can:category-delete'
		]);
	});
	//Quản lý danh mục nhà cung cấp (Provider)
	Route::group(['prefix' => 'providers'], function() {
		Route::get('/index',[
			'as' => 'providers.index',
			'uses' => 'ProviderController@index',
			'middleware' => 'can:provider-list'
		]);
		Route::get('/create',[
			'as' => 'providers.create',
			'uses' => 'ProviderController@create',
			'middleware' => 'can:provider-add'
		]);
		Route::post('/store',[
			'as' => 'providers.store',
			'uses' => 'ProviderController@store'
		]);
		Route::get('/edit/{id}',[
			'as' => 'providers.edit',
			'uses' => 'ProviderController@edit',
			'middleware' => 'can:provider-edit'
		]);
		Route::post('/update/{id}',[
			'as' => 'providers.update',
			'uses' => 'ProviderController@update'
		]);
		Route::get('/delete/{id}',[
			'as' => 'providers.destroy',
			'uses' => 'ProviderController@destroy',
			'middleware' => 'can:provider-delete'
		]);
	});
	//Quản lý thuộc tính sản phẩm (Attributes)
	Route::group(['prefix' => 'attributes'], function() {
		Route::get('/index', ['as' => 'attributes.index', 'uses' => 'AttributeController@index']);
		Route::get('/color/create', ['as' => 'attributes.color.create', 'uses' => 'AttributeController@getColor']);
		Route::post('/color/store', ['as' => 'attributes.color.store', 'uses' => 'AttributeController@postColor']);
		Route::get('/color/edit/{id}', ['as' =>'attributes.color.edit', 'uses' =>'AttributeController@getEditColor']);
		Route::post('/color/update/{id}', ['as' => 'attributes.color.update', 'uses' => 'AttributeController@postEditColor']);
		Route::get('/color/delete/{id}', ['as' => 'attributes.color.destroy', 'uses' => 'AttributeController@destroyColor']);
		Route::get('/size/create', ['as' => 'attributes.size.create', 'uses' => 'AttributeController@getSize']);
		Route::post('/size/store', ['as' => 'attributes.size.store', 'uses' => 'AttributeController@postSize']);
		Route::get('/size/edit/{id}', ['as' => 'attributes.size.edit', 'uses' => 'AttributeController@getEditSize']);
		Route::post('/size/update/{id}', ['as' => 'attributes.size.update', 'uses' => 'AttributeController@postEditSize']);
		Route::get('/size/delete/{id}', ['as' => 'attributes.size.destroy', 'uses' => 'AttributeController@destroySize']);	
	});
	//Quản lý sản phẩm (Product)
	Route::group(['prefix' => 'products'], function() {
		Route::get('/index',[
			'as' => 'products.index', 
			'uses' => 'ProductController@index',
			'middleware'=> 'can:product-list' 
		]);
		Route::get('/create',[ 
			'as' => 'products.create', 
			'uses' => 'ProductController@create',
			'middleware'=> 'can:product-add' 
		]);
		Route::post('/store',[ 
			'as' => 'products.store', 
			'uses' => 'ProductController@store' 
		]);
		Route::get('/edit/{id}',[ 
			'as' => 'products.edit', 
			'uses' => 'ProductController@edit',
			'middleware'=> 'can:product-edit,id' 
		]);
		Route::post('/update/{id}',[ 
			'as' => 'products.update', 
			'uses' => 'ProductController@update' 
		]);
		Route::get('/delete/{id}',[ 
			'as' => 'products.destroy', 
			'uses' => 'ProductController@destroy',
			'middleware'=> 'can:product-delete,id' 
		]);
	});
	//Quản lý Slide
	Route::group(['prefix' => 'slides'], function() {
		Route::get('/index',[ 
			'as' => 'slides.index', 
			'uses' => 'SlideController@index',
			'middleware' => 'can:slide-list' 
		]);
		Route::get('/create',[ 
			'as' => 'slides.create', 
			'uses' => 'SlideController@create',
			'middleware' => 'can:slide-add' 
		]);
		Route::post('/store',[ 
			'as' => 'slides.store', 
			'uses' => 'SlideController@store' 
		]);
		Route::get('/edit/{id}',[ 
			'as' => 'slides.edit', 
			'uses' => 'SlideController@edit',
			'middleware' => 'can:slide-edit' 
		]);
		Route::post('/update/{id}',[ 
			'as' => 'slides.update', 
			'uses' => 'SlideController@update' 
		]);
		Route::get('/delete/{id}',[ 
			'as' => 'slides.destroy',
			'uses' => 'SlideController@destroy',
			'middleware' => 'can:slide-delete' 
		]);
	});
	//Quản lý thông tin liên hệ (Contact)
	Route::group(['prefix' => 'contacts'], function() {
		Route::get('/index',[
			'as' => 'contacts.index', 
			'uses' => 'ContactController@index',
			'middleware' => 'can:contact-list'
		]);
		Route::get('/create',[
			'as' => 'contacts.create', 
			'uses' => 'ContactController@create',
			'middleware' => 'can:contact-add'
		]);
		Route::post('/store',[
			'as' => 'contacts.store', 
			'uses' => 'ContactController@store'
		]);
		Route::get('/edit/{id}',[
			'as' => 'contacts.edit', 
			'uses' => 'ContactController@edit',
			'middleware' => 'can:contact-edit'			
		]);
		Route::post('/update/{id}',[
			'as' => 'contacts.update', 
			'uses' => 'ContactController@update'
		]);
		Route::get('/delete/{id}',[
			'as' => 'contacts.destroy', 
			'uses' => 'ContactController@destroy',
			'middleware' => 'can:contact-delete'			
		]);
	});
	//Quản lý nhân viên (User)
	Route::group(['prefix' => 'users'], function() {
		Route::get('/index',[
			'as' => 'users.index', 
			'uses' => 'AdminUserController@index',
			'middleware' => 'can:user-list'
		]);
		Route::get('/create',[
			'as' => 'users.create', 
			'uses' => 'AdminUserController@create',
			'middleware' => 'can:user-add'
		]);
		Route::post('/store',[
			'as' => 'users.store', 
			'uses' => 'AdminUserController@store'
		]);
		Route::get('/edit/{id}',[
			'as' => 'users.edit', 
			'uses' => 'AdminUserController@edit',
			'middleware' => 'can:user-edit'
		]);
		Route::post('/update/{id}',[
			'as' => 'users.update', 
			'uses' => 'AdminUserController@update'
		]);
		Route::get('/delete/{id}',[
			'as' => 'users.destroy', 
			'uses' => 'AdminUserController@destroy',
			'middleware' => 'can:user-delete'
		]);
	});
	//Quản lý phân quyền (Permissions)
	Route::group(['prefix' => 'permissions'], function() {
		Route::get('/index',[
			'as' => 'permissions.index', 
			'uses' => 'PermissionController@index',
			'middleware' => 'can:permission-list'
		]);
		Route::get('/create',[
			'as' => 'permissions.create', 
			'uses' => 'PermissionController@create',
			'middleware' => 'can:permission-add'
		]);
		Route::post('/store',[
			'as' => 'permissions.store', 
			'uses' => 'PermissionController@store'
		]);
		Route::get('/edit/{id}',[
			'as' => 'permissions.edit', 
			'uses' => 'PermissionController@edit',
			'middleware' => 'can:permission-edit'
		]);
		Route::post('/update/{id}',[
			'as' => 'permissions.update', 
			'uses' => 'PermissionController@update'
		]);
		Route::get('/delete/{id}',[
			'as' => 'permissions.destroy', 
			'uses' => 'PermissionController@destroy',
			'middleware' => 'can:permission-delete'
		]);
	});
	//Quản lý vai trò (Roles)
	Route::group(['prefix' => 'roles'], function() {
		Route::get('/index',[
			'as' => 'roles.index', 
			'uses' => 'AdminRoleController@index',
			'middleware' => 'can:role-list'
		]);
		Route::get('/create',[
			'as' => 'roles.create', 
			'uses' => 'AdminRoleController@create',
			'middleware' => 'can:role-add'
		]);
		Route::post('/store',[
			'as' => 'roles.store', 
			'uses' => 'AdminRoleController@store'
		]);
		Route::get('/edit/{id}',[
			'as' => 'roles.edit',
			'uses' => 'AdminRoleController@edit',
			'middleware' => 'can:role-edit'
		]);
		Route::post('/update/{id}',[
			'as' => 'roles.update', 
			'uses' => 'AdminRoleController@update'
		]);
		Route::get('/delete/{id}',[
			'as' => 'roles.destroy',
			'uses' => 'AdminRoleController@destroy',
			'middleware' => 'can:role-delete'
		]);
	});
	//Quản lý bài viết (Blog)
	Route::group(['prefix' => 'blogs'], function() {
		Route::get('/index',[
			'as' => 'blogs.index', 
			'uses' => 'BlogController@index'
			
		]);
		Route::get('/create',[
			'as' => 'blogs.create', 
			'uses' => 'BlogController@create'
			
		]);
		Route::post('/store',[
			'as' => 'blogs.store', 
			'uses' => 'BlogController@store'
		]);
		Route::get('/edit/{id}',[
			'as' => 'blogs.edit',
			'uses' => 'BlogController@edit'
			
		]);
		Route::post('/update/{id}',[
			'as' => 'blogs.update', 
			'uses' => 'BlogController@update'
		]);
		Route::get('/delete/{id}',[
			'as' => 'blogs.destroy',
			'uses' => 'BlogController@destroy'
			
		]);
	});
	//Quản lý đơn hàng (Order)
	Route::group(['prefix' => 'orders'], function() {
		Route::get('/index',[
			'as' => 'orders.index', 
			'uses' => 'OrderController@index'			
		]);
		Route::get('/detail/{id}',[
			'as' => 'orders.detail', 
			'uses' => 'OrderController@orderDetail'			
		]);
		Route::get('/active/{id}',[
			'as' => 'orders.active', 
			'uses' => 'OrderController@activeOrder'			
		]);
		Route::get('/unactive/{id}',[
			'as' => 'orders.unactive', 
			'uses' => 'OrderController@unOrder'			
		]);
	});
	//Báo Cáo Thống Kê 
	Route::group(['prefix' => 'statistics'], function() {
		Route::get('/warehouse',['as' => 'statistics.warehouse','uses' => 'StatisticsController@wareHouseStatistic']);
		Route::get('/warehouse/export',['as' => 'warehouse.export.excel','uses' => 'StatisticsController@export']);
		Route::get('/index', ['as' => 'statistics.index','uses' => 'StatisticsController@index']);
		Route::get('/dashboard', ['as' => 'statistics.dashboard','uses' => 'StatisticsController@getDashBoard']);
	});
});

//Hiển thị form đăng nhập
Route::get('/login-admin', 'AdminController@login')->name('form_login');
//Đăng nhập vào trang Admin
Route::post('/login-admin', 'AdminController@postlogin');
//Đăng xuất khỏi trang Admin
Route::get('/logout', 'AdminController@logout')->name('logout');

/**
 *  FRONT-END
 */
//Trang chủ
Route::get('/', 'HomeController@index')->name('home');
// Danh mục sản phẩm
Route::get('/loai-san-pham/{slug}/{id}', ['as' => 'category.product', 'uses' => 'HomeController@productsType']);
//Chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{id}', ['as' => 'product_detail', 'uses' => 'HomeController@productDetail']);
//Route::get('/chi-tiet-san-pham-modal/{id}', ['as' => 'showModal', 'uses' => 'HomeController@showModal']);
//Liên hệ
Route::get('/lien-he', 'HomeController@contact')->name('contact');
//Giỏ hàng
Route::post('/add-cart/{id}', 'CartController@addToCart')->name('addToCart');
Route::get('/show-cart', 'CartController@index')->name('cart.index');
Route::get('/update-cart', 'CartController@updateCart')->name('updateCart');
Route::get('/delete-cart/{rowId}', 'CartController@deleteCart')->name('deleteCart');
Route::get('/delete-cart-all', 'CartController@deleteAll')->name('deleteAll');
//Thanh Toán
Route::get('/check-out', 'CheckoutController@getCheckout')->name('getCheckout');
Route::post('/check-out', 'CheckoutController@postCheckout')->name('postCheckout');











