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

Route::group(['namespace'=>'Frontend'],function(){
    Route::get('/', [
        'as'=>'f_index',
        'uses'=>'HomeController@index'
    ]);
});


Route::group(['namespace'=>'Backend','prefix'=>'admin'],function (){
   /**
    * Routes for User namespace
    */
    Route::group(['namespace'=>'User'],function (){
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in UserController
         */
        Route::group(['prefix'=>'user'],function (){
            /**
             * Route show all users resources
             */
            Route::get('list',[
               'as'=>'admin_user_list',
               'uses'=>'UserController@index' 
            ]);
            /**
             * Route show form for create user
             */
            Route::get('create',[
               'as'=>'admin_user_create',
               'uses'=>'UserController@create'
            ]);
            /**
             * Route for store user
             */
            Route::post('store',[
               'as'=>'admin_user_store',
               'uses'=>'UserController@store'
            ]);
            /**
             * Route show form for edit user
             */
            Route::get('edit',[
               'as'=>'admin_user_edit',
               'uses'=>'UserController@edit'
            ]);
            /**
             * Route for update user
             */
            Route::post('update',[
                'as'=>'admin_user_update',
                'uses'=>'UserController@update'
            ]);
            /**
             * Route for destroy user
             */
            Route::post('destroy',[
               'as'=>'admin_user_destroy',
               'uses'=>'UserController@destroy'
            ]);
        });
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in UserFieldController
         */
        Route::group(['prefix'=>'user/field'],function (){
           /**
            * Route for show all user field resources
            */
            Route::get('list',[
               'as'=>'admin_user_field_list',
               'uses'=>'UserFieldController@index'
            ]);
            /**
             * Route for show form for create user field
             */
            Route::get('create',[
                'as'=>'admin_user_field_create',
                'uses'=>'UserFieldController@create'
            ]);
            /**
             * Route for store user field
             */
            Route::post('store',[
                'as'=>'admin_user_field_store',
                'uses'=>'UserFieldController@store'
            ]);
            /**
             * Route show form for edit
             */
            Route::get('edit',[
               'as'=>'admin_user_field_edit',
               'uses'=>'UserFieldController@edit' 
            ]);
            /**
             * Route for update user field
             */
            Route::post('update',[
                'as'=>'admin_user_field_update',
                'uses'=>'UserFieldController@update'
            ]);
            /**
             * Route for destroy user field
             */
            Route::post('destroy',[
                'as'=>'admin_user_field_destroy',
                'uses'=>'UserFieldController@destroy'
            ]);
        });
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in UserFieldSettingController
         */
        Route::group(['prefix'=>'user/field/setting'],function (){
            /**
             * Route for show all user field setting resources
             */
            Route::get('list',[
                'as'=>'admin_user_field_setting_list',
                'uses'=>'UserFieldSettingController@index'
            ]);
            /**
             * Route for show form for create user setting field
             */
            Route::get('create',[
                'as'=>'admin_user_field_setting_create',
                'uses'=>'UserFieldSettingController@create'
            ]);
            /**
             * Route for store user field setting
             */
            Route::post('store',[
                'as'=>'admin_user_field_setting_store',
                'uses'=>'UserFieldSettingController@store'
            ]);
            /**
             * Route show form for edit
             */
            Route::get('edit',[
                'as'=>'admin_user_field_setting_edit',
                'uses'=>'UserFieldSettingController@edit'
            ]);
            /**
             * Route for update user field setting
             */
            Route::post('update',[
                'as'=>'admin_user_field_setting_update',
                'uses'=>'UserFieldSettingController@update'
            ]);
            /**
             * Route for destroy user field setting
             */
            Route::post('destroy',[
                'as'=>'admin_user_field_setting_destroy',
                'uses'=>'UserFieldSettingController@destroy'
            ]);
        });
    });

    /**
     * Routes for Product namespace
     */
    Route::group(['namespace'=>'Product'],function (){
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in ProductController
         */
        Route::group(['prefix'=>'product'],function(){
            /**
             * Route for show all product resources
             */
            Route::get('list',[
                'as'=>'admin_product_list',
                'uses'=>'ProductController@index'
            ]);
            /**
             * Route for show form for create product
             */
            Route::get('create',[
                'as'=>'admin_user_product_create',
                'uses'=>'ProductController@create'
            ]);
            /**
             * Route for store product
             */
            Route::post('store',[
                'as'=>'admin_product_store',
                'uses'=>'ProductController@store'
            ]);
            /**
             * Route show form for edit
             */
            Route::get('edit',[
                'as'=>'admin_product_edit',
                'uses'=>'ProductController@edit'
            ]);
            /**
             * Route for update product
             */
            Route::post('update',[
                'as'=>'admin_product_update',
                'uses'=>'ProductController@update'
            ]);
            /**
             * Route for destroy product
             */
            Route::post('destroy',[
                'as'=>'admin_product_destroy',
                'uses'=>'ProductController@destroy'
            ]);
        });
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in ProductFieldController
         */
        Route::group(['prefix'=>'product/field'],function(){
            /**
             * Route for show all product field resources
             */
            Route::get('list',[
                'as'=>'admin_product_field_list',
                'uses'=>'ProductFieldController@index'
            ]);
            /**
             * Route for show form for create product field
             */
            Route::get('create',[
                'as'=>'admin_user_product_field_create',
                'uses'=>'ProductFieldController@create'
            ]);
            /**
             * Route for store product field
             */
            Route::post('store',[
                'as'=>'admin_product_field_store',
                'uses'=>'ProductFieldController@store'
            ]);
            /**
             * Route show form for edit
             */
            Route::get('edit',[
                'as'=>'admin_product_field_edit',
                'uses'=>'ProductFieldController@edit'
            ]);
            /**
             * Route for update product field
             */
            Route::post('update',[
                'as'=>'admin_product_field_update',
                'uses'=>'ProductFieldController@update'
            ]);
            /**
             * Route for destroy product field
             */
            Route::post('destroy',[
                'as'=>'admin_product_field_destroy',
                'uses'=>'ProductFieldController@destroy'
            ]);
        });
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in ProductFieldSettingController
         */
        Route::group(['prefix'=>'product/field/setting'],function(){
            /**
             * Route for show all product field setting resources
             */
            Route::get('list',[
                'as'=>'admin_product_field_setting_list',
                'uses'=>'ProductFieldSettingController@index'
            ]);
            /**
             * Route for show form for create product field setting
             */
            Route::get('create',[
                'as'=>'admin_user_product_field_setting_create',
                'uses'=>'ProductFieldSettingController@create'
            ]);
            /**
             * Route for store product field setting
             */
            Route::post('store',[
                'as'=>'admin_product_field_setting_store',
                'uses'=>'ProductFieldSettingController@store'
            ]);
            /**
             * Route show form for edit
             */
            Route::get('edit',[
                'as'=>'admin_product_field_setting_edit',
                'uses'=>'ProductFieldSettingController@edit'
            ]);
            /**
             * Route for update product field setting
             */
            Route::post('update',[
                'as'=>'admin_product_field_setting_update',
                'uses'=>'ProductFieldSettingController@update'
            ]);
            /**
             * Route for destroy product field setting
             */
            Route::post('destroy',[
                'as'=>'admin_product_field_setting_destroy',
                'uses'=>'ProductFieldSettingController@destroy'
            ]);
        });
    });

    /**
     * Routes for Slider namespace
     */
    Route::group(['namespace'=>'Slider'],function (){
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in SliderController
         */
        Route::group(['prefix'=>'slider'],function (){
            /**
             * Route show all slider resources
             */
            Route::get('list',[
                'as'=>'admin_slider_list',
                'uses'=>'SliderController@index'
            ]);
            /**
             * Route show form for create slider
             */
            Route::get('create',[
                'as'=>'admin_slider_create',
                'uses'=>'SliderController@create'
            ]);
            /**
             * Route for store slider
             */
            Route::post('store',[
                'as'=>'admin_slider_store',
                'uses'=>'SliderController@store'
            ]);
            /**
             * Route show form for edit slider
             */
            Route::get('edit',[
                'as'=>'admin_slider_edit',
                'uses'=>'SliderController@edit'
            ]);
            /**
             * Route for update slider
             */
            Route::post('update',[
                'as'=>'admin_slider_update',
                'uses'=>'SliderController@update'
            ]);
            /**
             * Route for destroy slider
             */
            Route::post('destroy',[
                'as'=>'admin_slider_destroy',
                'uses'=>'SliderController@destroy'
            ]);
        });
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in SliderPhotoController
         */
        Route::group(['prefix'=>'slider/photo'],function (){
            /**
             * Route show all slider photo resources
             */
            Route::get('list',[
                'as'=>'admin_slider_photo_list',
                'uses'=>'SliderPhotoController@index'
            ]);
            /**
             * Route show form for create slider photo
             */
            Route::get('create',[
                'as'=>'admin_slider_photo_create',
                'uses'=>'SliderPhotoController@create'
            ]);
            /**
             * Route for store slider photo
             */
            Route::post('store',[
                'as'=>'admin_slider_photo_store',
                'uses'=>'SliderPhotoController@store'
            ]);
            /**
             * Route show form for edit slider photo
             */
            Route::get('edit',[
                'as'=>'admin_slider_photo_edit',
                'uses'=>'SliderPhotoController@edit'
            ]);
            /**
             * Route for update slider photo
             */
            Route::post('update',[
                'as'=>'admin_slider_photo_update',
                'uses'=>'SliderPhotoController@update'
            ]);
            /**
             * Route for destroy slider photo
             */
            Route::post('destroy',[
                'as'=>'admin_slider_photo_destroy',
                'uses'=>'SliderPhotoController@destroy'
            ]);
        });
    });

    /**
     * Routes for Category namespace
     */
    Route::group(['namespace'=>'Category'],function (){
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in CategoryController
         */
        Route::group(['prefix'=>'category'],function (){
            /**
             * Route show all categories resources
             */
            Route::get('list',[
                'as'=>'admin_category_list',
                'uses'=>'CategoryController@index'
            ]);
            /**
             * Route show form for create category
             */
            Route::get('create',[
                'as'=>'admin_category_create',
                'uses'=>'CategoryController@create'
            ]);
            /**
             * Route for store category
             */
            Route::post('store',[
                'as'=>'admin_category_store',
                'uses'=>'CategoryController@store'
            ]);
            /**
             * Route show form for edit category
             */
            Route::get('edit',[
                'as'=>'admin_category_edit',
                'uses'=>'CategoryController@edit'
            ]);
            /**
             * Route for update category
             */
            Route::post('update',[
                'as'=>'admin_category_update',
                'uses'=>'CategoryController@update'
            ]);
            /**
             * Route for destroy category
             */
            Route::post('destroy',[
                'as'=>'admin_category_destroy',
                'uses'=>'CategoryController@destroy'
            ]);
        });
    });

    /**
     * Routes for System namespace
     */
    Route::group(['namespace'=>'System'],function (){
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in SystemSettingController
         */
        Route::group(['prefix'=>'system/setting'],function (){
            /**
             * Route show all systems settings resources
             */
            Route::get('list',[
                'as'=>'admin_system_setting_list',
                'uses'=>'SystemSettingController@index'
            ]);
            /**
             * Route show form for create system setting
             */
            Route::get('create',[
                'as'=>'admin_system_setting_create',
                'uses'=>'SystemSettingController@create'
            ]);
            /**
             * Route for store system setting
             */
            Route::post('store',[
                'as'=>'admin_system_setting_store',
                'uses'=>'SystemSettingController@store'
            ]);
            /**
             * Route show form for edit system setting
             */
            Route::get('edit',[
                'as'=>'admin_system_setting_edit',
                'uses'=>'SystemSettingController@edit'
            ]);
            /**
             * Route for update system setting
             */
            Route::post('update',[
                'as'=>'admin_system_setting_update',
                'uses'=>'SystemSettingController@update'
            ]);
            /**
             * Route for destroy system setting
             */
            Route::post('destroy',[
                'as'=>'admin_system_setting_destroy',
                'uses'=>'SystemSettingController@destroy'
            ]);
        });
    });

    /**
     * Routes for Local namespace
     */
    Route::group(['namespace'=>'Local'],function (){
        /**
         * User authenticate required for access in this section
         * this section contains the routes for access to the
         * functions stores in LocalController
         */
        Route::group(['prefix'=>'local'],function (){
            /**
             * Route show all locals resources
             */
            Route::get('list',[
                'as'=>'admin_local_list',
                'uses'=>'LocalController@index'
            ]);
            /**
             * Route show form for create local
             */
            Route::get('create',[
                'as'=>'admin_local_create',
                'uses'=>'LocalController@create'
            ]);
            /**
             * Route for store local
             */
            Route::post('store',[
                'as'=>'admin_local_store',
                'uses'=>'LocalController@store'
            ]);
            /**
             * Route show form for edit local
             */
            Route::get('edit',[
                'as'=>'admin_local_edit',
                'uses'=>'LocalController@edit'
            ]);
            /**
             * Route for update local
             */
            Route::post('update',[
                'as'=>'admin_local_update',
                'uses'=>'LocalController@update'
            ]);
            /**
             * Route for destroy local
             */
            Route::post('destroy',[
                'as'=>'admin_local_destroy',
                'uses'=>'LocalController@destroy'
            ]);
        });
    });
});