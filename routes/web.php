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

Route::get('/', 'PagesController@index')->name('index');

Route::group(['prefix' =>'products'], function(){


Route::get('/', 'ProductController@products')->name('products');

Route::get('/product/{slug}', 'ProductController@show')->name('products.show');

//category
Route::get('/categories', 'ProductController@index')->name('categories.index');
Route::get('/category/{id}', 'ProductController@show_category')->name('categories.show');
//post_categoty

});

Route::group(['prefix' =>'knowledge_bank'], function(){

Route::get('/', 'BlogController@showindex')->name('knowledge_bank');
Route::get('/post/{slug}', 'BlogController@show')->name('post.show');
Route::get('/category/{id}', 'BlogController@show_category')->name('blog_categories.show');

 
});

Route::group(['prefix' =>'admin'], function(){
	Route::get('/', 'AdminPagesController@index')->name('admin.index');


	Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');

	Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');

Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');


	

     
	Route::get('/product/create', 'AdminPagesController@product_create')->name('admin.product.create');
	Route::post('/product/create', 'AdminPagesController@product_store')->name('admin.product.store');
Route::post('/product/edit/{id}', 'AdminPagesController@product_update')->name('admin.product.update');
 Route::get('/product/delete/{id}', 'AdminPagesController@product_delete')->name('admin.product.delete');
	Route::get('/products', 'AdminPagesController@manage_products')->name('admin.products');
	Route::get('/product/edit/{id}', 'AdminPagesController@product_edit')->name('admin.product.edit');


	Route::get('/blog/create', 'AdminBlogController@create')->name('admin.blog.create');
	Route::get('/blogs', 'AdminBlogController@index')->name('admin.blogs');
	Route::post('/blog/create', 'AdminBlogController@store')->name('admin.blog.store');
	Route::get('/blog/edit/{id}', 'AdminBlogController@edit')->name('admin.blog.edit');
Route::post('/blog/edit/{id}', 'AdminBlogController@update')->name('admin.blog.update');
Route::get('/blog/delete/{id}', 'AdminBlogController@delete')->name('admin.blog.delete');




		Route::get('/blog_categories', 'BlogCategoriesController@index')->name('admin.blog_categories');
Route::get('/blog_category/create', 'BlogCategoriesController@create')->name('admin.blog_category.create');
	Route::post('/store', 'BlogCategoriesController@store')->name('admin.blog_category.store');
Route::post('/category/edit/{id}','BlogCategoriesController@update')->name('admin.blog_category.update');
 Route::get('/category/delete/{id}', 'BlogCategoriesController@delete')->name('admin.blog_category.delete');
	Route::get('/edit/{id}', 'BlogCategoriesController@edit')->name('admin.blog_category.edit');






      Route::group(['prefix' =>'categories'], function(){

		Route::get('/', 'CategoryController@index')->name('admin.categories');
Route::get('/category/create', 'CategoryController@create')->name('admin.category.create');
	Route::post('/store', 'CategoryController@store')->name('admin.category.store');
Route::post('/category/edit/{id}','CategoryController@update')->name('admin.category.update');
 Route::get('/category/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
	Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');

});

       Route::group(['prefix' =>'/orders'], function(){

       Route::get('/', 'AdminOrderController@index')->name('admin.orders');
		Route::get('/view/{id}', 'AdminOrderController@show')->name('admin.order.show');
 Route::get('/delete/{id}', 'AdminOrderController@delete')->name('admin.order.delete');
 Route::post('/completed/{id}', 'AdminOrderController@completed')->name('admin.order.completed');
 Route::post('/paid/{id}', 'AdminOrderController@paid')->name('admin.order.paid');

});


       Route::group(['prefix' =>'/helplines'], function(){

       Route::get('/', 'AdminHelplineController@index')->name('admin.helplines');
 Route::get('/delete/{id}', 'AdminHelplineController@delete')->name('admin.help.delete');
 Route::get('/completed/{id}', 'AdminHelplineController@completed')->name('admin.help.completed');


});

      Route::group(['prefix' =>'divisions'], function(){

		Route::get('/', 'DivisionController@index')->name('admin.divisions');
	Route::get('/division/create', 'DivisionController@create')->name('admin.division.create');
	Route::post('/store', 'DivisionController@store')->name('admin.division.store');
Route::post('/division/edit/{id}', 'DivisionController@update')->name('admin.division.update');
 Route::get('/division/delete/{id}', 'DivisionController@delete')->name('admin.division.delete');
	Route::get('/edit/{id}', 'DivisionController@edit')->name('admin.division.edit');

});

      Route::group(['prefix' =>'districts'], function(){

		Route::get('/', 'DistrictController@index')->name('admin.districts');
	Route::get('/district/create', 'DistrictController@create')->name('admin.district.create');
	Route::post('/store', 'DistrictController@store')->name('admin.district.store');
Route::post('/District/edit/{id}', 'DistrictController@update')->name('admin.district.update');
 Route::get('/District/delete/{id}', 'DistrictController@delete')->name('admin.district.delete');
	Route::get('/edit/{id}', 'DistrictController@edit')->name('admin.district.edit');

});


      Route::group(['prefix' =>'sub_districts'], function(){

		Route::get('/', 'Sub_districtController@index')->name('admin.sub_districts');
	Route::get('/sub_district/create','Sub_districtController@create')->name('admin.sub_district.create');
	Route::post('/store', 'Sub_districtController@store')->name('admin.sub_district.store');
Route::post('/Sub_district/edit/{id}','Sub_districtController@update')->name('admin.sub_district.update');
 Route::get('/Sub_district/delete/{id}', 'Sub_districtController@delete')->name('admin.sub_district.delete');
	Route::get('/edit/{id}', 'Sub_districtController@edit')->name('admin.sub_district.edit');

});

  Route::group(['prefix' =>'unions'], function(){

		Route::get('/', 'UnionController@index')->name('admin.unions');
	Route::get('/union/create','UnionController@create')->name('admin.union.create');
	Route::post('/store', 'UnionController@store')->name('admin.union.store');
Route::post('/union/edit/{id}','UnionController@update')->name('admin.union.update');
 Route::get('/union/delete/{id}', 'UnionController@delete')->name('admin.union.delete');
	Route::get('/edit/{id}', 'UnionController@edit')->name('admin.union.edit');

});







});

Route::group(['prefix' =>'carts'], function(){

Route::get('/', 'CartController@index')->name('carts');

 Route::post('/carts', 'CartController@store')->name('carts.store');
 Route::post('/update/{id}', 'CartController@update')->name('carts.update');
 Route::post('/delete/{id}', 'CartController@delete')->name('carts.delete');





});

Route::group(['prefix' =>'checkouts'], function(){

Route::get('/', 'OrderController@index')->name('checkouts');


 Route::post('/store', 'OrderController@store')->name('checkouts.store');


 
});

Route::group(['prefix' =>'helpline'], function(){

Route::get('/', 'HelplineController@index')->name('helpline');


 Route::post('/store', 'HelplineController@store')->name('helpline.store');


 
});










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//API Routes
 Route::get('get-districts/{id}',function($id){
	return json_encode(App\District::where('division_id',$id)->get());

});
Route::get('get-sub_districts/{id}',function($id){
	return json_encode(App\Sub_district::where('district_id',$id)->get());

});

Route::get('get-unions/{id}',function($id){
	return json_encode(App\Union::where('sub_district_id',$id)->get());


});
