<?php

//=============Frontend Routes======================

Route::group(['namespace' => 'frontend'], function () {                      //namespace le kun end ma use hune batauchha..
    Route::any('/', 'ApplicationController@index')->name('index');
    Route::any('contact', 'ApplicationController@contact')->name('contact');


    //to show the items...
    Route::any('showItems/{subcat_id}', 'ApplicationController@showItems')->name('showitems');
    //to show the details of the items..
    Route::any('/item-detail/{id}', 'ApplicationController@itemDetail')->name('item-detail');
    //===========================add to cart=======================
    Route::any('add-to-cart/{id}', 'ApplicationController@addtoCart')->name('add-to-cart');
    //=========================view cart============================================
    Route::any('view-cart', 'ApplicationController@viewCart')->name('view-cart');


});

//Route::group(['prefix' => '@admin'], function () {
//
//    Route::any('admin-login', 'AdminLoginController@login')->name('admin-login');
//
//    Route::group(['middleware' => 'auth:admin'], function () {
//        Route::any('/', 'DashboardController@index')->name('dashboard');
//
//
//        Route::any('admin-logout', 'AdminLoginController@logout')->name('admin-logout');
//
//    });
//
//});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


//=============Backend Routes======================

//Route:: group(['namespace' => 'backend', 'prefix' => '@admin'], function () {  //prefix le / pachhiko title dekhauchha
//    Route::any('/', 'DashboardController@index')->name('dashboard');

//============backend login============//

Route::group(['namespace' => 'backend', 'prefix' => '@admin'], function () {

    //===========Routes to reset the password=====//
    Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::any('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.request');
    Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');


    Route::any('admin-login', 'AdminLoginController@login')->name('admin-login');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::any('/', 'DashboardController@index')->name('dashboard');


        Route::any('admin-logout', 'AdminLoginController@logout')->name('admin-logout');


        //===============admin routes===============

        Route::group(['prefix' => 'admin',], function () {
            Route::any('/', 'AdminController@index')->name('admin');
            Route::any('add-admin', 'AdminController@addUser')->name('add-admin');
            Route::any('update-admin-status', 'AdminController@updateStatus')->name('update-admin-status');
            Route::any('update-user-type', 'AdminController@updateType')->name('update-user-status');
            Route::any('delete-user/{criteria?}', 'AdminController@deleteUser')->name('delete-user');
            Route::any('edit-user/{criteria?}', 'AdminController@editUser')->name('edit-user');
            Route::any('edit-user-action', 'AdminController@editUserAction')->name('edit-user-action');

        });

        //===============slider routes===============

        Route::group(['prefix' => 'slider',], function () {
            Route::any('/', 'SliderController@index')->name('slider');
            Route::any('add-slider', 'SliderController@addSlider')->name('add-slider');
            Route::any('update-slide-status', 'SliderController@updateSliderStatus')->name('update-slide-status');
            Route::any('delete-slider/{criteria?}', 'SliderController@deleteSlide')->name('delete-slider');
            Route::any('edit-slider/{criteria?}', 'SliderController@editSlide')->name('edit-slider');
            Route::any('edit-slider-action', 'SliderController@editSlideAction')->name('edit-slider-action');


        });


        //=============category routes==================

        Route::group(['prefix' => 'category',], function () {
            Route::any('/', 'CategoryController@index')->name('category');
            Route::any('add-category', 'CategoryController@addCategory')->name('add-category');
            Route::any('delete-category/{criteria?}', 'CategoryController@deleteCategory')->name('delete-category');
            Route::any('edit-category/{criteria?}', 'CategoryController@editCategory')->name('edit-category');
            Route::any('edit-category-action', 'CategoryController@editCategoryAction')->name('edit-category-action');


        });

        //=============sub-category routes==================

        Route::group(['prefix' => 'subcategory',], function () {
            Route::any('/', 'SubCategoryController@index')->name('subcategory');
            Route::any('add-subcategory', 'SubCategoryController@addSubCategory')->name('add-subcategory');
            Route::any('delete-subcategory/{criteria?}', 'SubCategoryController@deleteSubcategory')->name('delete-subcategory');


        });

        //=============brand routes==================

        Route::group(['prefix' => 'brands',], function () {
            Route::any('/', 'BrandController@index')->name('brands');
            Route::any('add-brand', 'BrandController@addBrand')->name('add-brand');
            Route::any('delete-brand/{criteria?}', 'BrandController@deleteBrand')->name('delete-brand');
            Route::any('edit-brand/{criteria?}', 'BrandController@editBrand')->name('edit-brand');
            Route::any('edit-brand-action', 'BrandController@editBrandAction')->name('edit-brand-action');


        });

        //=============item routes==================

        Route::group(['prefix' => 'items',], function () {
            Route::any('/', 'ItemController@index')->name('items');
            Route::any('add-item', 'ItemController@addItem')->name('add-item');
            Route::any('delete-item/{criteria?}', 'ItemController@deleteItem')->name('delete-item');
            Route::any('edit-item/{criteria?}', 'ItemController@editItem')->name('edit-item');
            Route::any('edit-item-action', 'ItemController@editItemAction')->name('edit-item-action');


            //==============================backend/product-attributes====================
            Route::any('/item-attribute/{id}', 'ItemController@addAttribute')->name('item-attribute');


        });

    });

});


