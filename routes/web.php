<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('contact/us', 'helloController@contact')->name('contact');
Route::get('about/us', 'helloController@about')->name('about');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'HomeController@logout')->name('user.logout');

// ==============================Categories=================================//
Route::get('/categories', 'backend\CategoryController@index')->name('categories');
Route::post('/categories/store', 'backend\CategoryController@store')->name('store.category');
Route::get('/categories/delete/{id}','backend\CategoryController@delete')->name('delete.category');
Route::get('/categories/edit/{id}','backend\CategoryController@edit')->name('edit.category');
Route::post('/categories/update/{id}', 'backend\CategoryController@update')->name('update.category');

// ==============================Subcategories=================================//

Route::get('/subcategories', 'backend\SubCategoryController@index')->name('subcategories');
Route::post('/subcategories/store', 'backend\SubCategoryController@store')->name('store.subcategory');
Route::get('/subcategories/delete/{id}','backend\SubCategoryController@delete')->name('delete.subcategory');
Route::get('/subcategories/edit/{id}','backend\SubCategoryController@edit')->name('edit.subcategory');
Route::post('/subcategories/update/{id}', 'backend\SubCategoryController@update')->name('update.subcategory');

// ==============================Districts=================================//
Route::get('/districts', 'backend\DistrictController@distict_index')->name('district');
Route::post('/district/store', 'backend\DistrictController@store')->name('store.district');
Route::get('/district/delete/{id}','backend\DistrictController@delete')->name('delete.district');
Route::get('/district/edit/{id}','backend\DistrictController@edit')->name('edit.district');
Route::post('/district/update/{id}', 'backend\DistrictController@update')->name('update.district');

// ==============================SubDistricts=================================//
Route::get('/subdistricts', 'backend\SubDistrictController@index')->name('subdistrict');
Route::post('/subdistricts/store', 'backend\SubDistrictController@store')->name('store.subdistrict');
Route::get('/subdistricts/edit/{id}', 'backend\SubDistrictController@edit')->name('edit.subdistrict');
Route::post('/subdistricts/update/{id}', 'backend\SubDistrictController@update')->name('update.subdistrict');
Route::get('/subdistricts/delete/{id}','backend\SubDistrictController@delete')->name('delete.subdistrict');

// ==============================Post=================================//

Route::get('md5(add/new/post)', 'backend\PostController@create')->name('insert.post');
Route::get('/all/post/', 'backend\PostController@index')->name('all.post');
Route::post('/new/post/store', 'backend\PostController@store')->name('store.post');
Route::get('/all/post/{id}', 'backend\PostController@delete')->name('post.delete');
Route::get('/all/post/edit/{id}', 'backend\PostController@edit')->name('post.edit');
Route::post('/all/post/update/{id}', 'backend\PostController@update')->name('update.post');

//===============================Ajax Request=========================//

Route::get('/get/subcategory/{category_id}','backend\PostController@GetSubCategory');
Route::get('/get/subdistrict/{district_id}','backend\PostController@GetSubdistrict');

//===============================Settings=========================//
Route::get('/social/setting/', 'backend\SettingController@Socialsetting')->name('social.setting');
Route::post('/update/social/{id}', 'backend\SettingController@UpdateSocial')->name('update.social');


Route::get('/seo/setting/', 'backend\SettingController@SeoSetting')->name('seo.setting');
Route::post('/update/seo/{id}', 'backend\SettingController@UpdateSEO')->name('update.seo');

Route::get('/namaz/setting/', 'backend\SettingController@NamazSetting')->name('namaz.setting');
Route::post('/update/namaz/{id}', 'backend\SettingController@UpdateNamaz')->name('update.namaztime');

Route::get('/LiveTv/setting/', 'backend\SettingController@LiveTv')->name('livetv.setting');
Route::post('/update/LiveTv/{id}', 'backend\SettingController@UpdateLiveTv')->name('update.livetv');
Route::get('/active/livetv/{id}', 'backend\SettingController@ActiveLiveTv')->name('active.livetv');
Route::get('/deactive/livetv/{id}', 'backend\SettingController@DeactiveLiveTv')->name('deactive.livetv');
//notice

Route::get('/notice/setting/', 'backend\SettingController@NoticeSetting')->name('notice.setting');
Route::post('/update/notice/{id}', 'backend\SettingController@UpdateNotice')->name('update.notice');
Route::get('/active/notice/{id}', 'backend\SettingController@ActiveNotice')->name('active.notice');
Route::get('/deactive/notice/{id}', 'backend\SettingController@DeactiveNotice')->name('deactive.notice');
//website
Route::get('/important/website/', 'backend\SettingController@Website')->name('website.setting');
Route::post('/important/website/store', 'backend\SettingController@Web_store')->name('store.website');
Route::get('/important/website/edit/{id}','backend\SettingController@web_edit')->name('edit.website');
Route::post('/important/website/update/{id}', 'backend\SettingController@web_update')->name('update.website');
Route::get('/important/website/delete/{id}','backend\SettingController@web_delete')->name('delete.website');

//photo
Route::get('/photo/gallery/', 'backend\GalleryController@photos')->name('photo.gallery');
Route::post('/photo/Gallery/store', 'backend\GalleryController@photoStore')->name('store.photos');
Route::get('/photo/Gallery/edit/{id}','backend\GalleryController@photo_edit')->name('edit.photos');
Route::post('/photo/Gallery/update/{id}', 'backend\GalleryController@update')->name('update.photos');
Route::get('/photo/Gallery/delete/{id}','backend\GalleryController@delete')->name('delete.photos');

//video

Route::get('/video/gallery/', 'backend\GalleryController@video')->name('video.gallery');
Route::post('/video/Gallery/store', 'backend\GalleryController@videoStore')->name('store.videos');
Route::get('/video/Gallery/edit/{id}','backend\GalleryController@video_edit')->name('edit.video');
Route::post('/video/Gallery/update/{id}', 'backend\GalleryController@video_update')->name('update.video');
Route::get('/video/Gallery/delete/{id}','backend\GalleryController@Video_delete')->name('delete.video');

//frontend
   //language
Route::get('/lang/english', 'Frontend\ExtraController@English')->name('lang.english');  
Route::get('/lang/bangla', 'Frontend\ExtraController@Bangla')->name('lang.bangla');  