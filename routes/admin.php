<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\FinalistController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\CountyController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TypeCategoryController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\AdvertisementController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\CategoryController;


/*-------------------------------------------------------
                    Dashboard routes
-------------------------------------------------------*/
Route::get('admin/dashboard', function () {
    return view('_admin.dashboard.crm.index');
})->middleware('auth');
/*-------------------------------------------------------
                    Category routes
-------------------------------------------------------*/

Route::prefix('_admin.categories')->name('admin.')->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth');
    Route::get('categoryCreate', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth');
    Route::get('categoryView/{category}', [CategoryController::class, 'show'])->name('category.show')->middleware('auth');
    Route::get('categoryEdit/{category}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
    Route::put('categoryUpdate/{category}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
    Route::get('categoryDelete/{category}', [CategoryController::class, 'destroy'])->name('category.delete')->middleware('auth');
});
/*-------------------------------------------------------
                    Author routes
-------------------------------------------------------*/
/*
Route::prefix('_admin.authors')->name('admin.')->group(function () {
    Route::get('author', [AuthorController::class, 'index'])->name('author.index')->middleware('auth');
    Route::get('authorCreate', [AuthorController::class, 'create'])->name('author.create')->middleware('auth');
    Route::post('authorStore', [AuthorController::class, 'store'])->name('author.store')->middleware('auth');
    Route::get('authorView/{author}', [AuthorController::class, 'show'])->name('author.show')->middleware('auth');
    Route::get('authorEdit/{author}', [AuthorController::class, 'edit'])->name('author.edit')->middleware('auth');
    Route::put('authorUpdate/{author}', [AuthorController::class, 'update'])->name('author.update')->middleware('auth');
    Route::get('authorDelete/{author}', [AuthorController::class, 'destroy'])->name('author.delete')->middleware('auth');
}); */


/*-------------------------------------------------------
                    News routes
-------------------------------------------------------*/
Route::prefix('_admin.news')->name('admin.')->group(function () {
    Route::get('news', [NewsController::class, 'index'])->name('news.index')->middleware('auth');
    Route::get('newsCreate', [NewsController::class, 'create'])->name('news.create')->middleware('auth');
    Route::post('newsStore', [NewsController::class, 'store'])->name('news.store')->middleware('auth');
    Route::get('newsEdit/{news}', [NewsController::class, 'edit'])->name('news.edit')->middleware('auth');
    Route::put('newsUpdate/{news}', [NewsController::class, 'update'])->name('news.update')->middleware('auth');
    Route::get('newsViews/{news}', [NewsController::class, 'show'])->name('news.view')->middleware('auth');
    Route::get('newsDelete/{news}', [NewsController::class, 'destroy'])->name('news.delete')->middleware('auth');
    Route::resource('tags', TagController::class);
});


/* -----------------------------------------------
                    Event Routes
--------------------------------------------------*/
Route::prefix('_admin/events')->name('admin.')->group(function () {
    Route::get('event', [EventController::class, 'index'])->name('event.index')->middleware('auth');
    Route::get('eventCreate', [EventController::class, 'create'])->name('event.create')->middleware('auth');
    Route::post('eventStore', [EventController::class, 'store'])->name('event.store')->middleware('auth');
    Route::get('eventEdit/{event}', [EventController::class, 'edit'])->name('event.edit')->middleware('auth');
    Route::put('eventUpdate/{event}', [EventController::class, 'update'])->name('event.update')->middleware('auth');
    Route::get('eventView/{event}', [EventController::class, 'show'])->name('event.view')->middleware('auth');
    Route::get('eventDelete/{event}', [EventController::class, 'destroy'])->name('event.delete')->middleware('auth');
});


/*-------------------------------------------------------
                    Comment Routes
-------------------------------------------------------*/

Route::prefix('_admin/comments')->name('admin.')->group(function () {
    Route::get('comment', [CommentController::class, 'index'])->name('comments.index')->middleware('auth');
    Route::get('commentCreate', [CommentController::class, 'create'])->name('comment.create')->middleware('auth');
    Route::post('commentStore', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');
    Route::get('commentEdit/{comment}', [CommentController::class, 'edit'])->name('comment.edit')->middleware('auth');
    Route::put('commentUpdate/{comment}', [CommentController::class, 'update'])->name('comment.update')->middleware('auth');
    Route::get('commentView/{comment}', [CommentController::class, 'show'])->name('comment.view')->middleware('auth');
    Route::get('commentDelete/{comment}', [CommentController::class, 'destroy'])->name('comment.delete')->middleware('auth');
});

/*-------------------------------------------------------
                    Tags Routes
-------------------------------------------------------*/

Route::prefix('_admin.tags')->name('admin.')->group(function () {
    Route::get('tags', [TagController::class, 'index'])->name('tags.index')->middleware('auth');
    Route::get('tagCreate', [TagController::class, 'create'])->name('tag.create')->middleware('auth');
    Route::post('tagStore', [TagController::class, 'store'])->name('tag.store')->middleware('auth');
    Route::get('tagEdit/{tag}', [TagController::class, 'edit'])->name('tag.edit')->middleware('auth');
    Route::put('tagUpdate/{tag}', [TagController::class, 'update'])->name('tag.update')->middleware('auth');
    Route::get('tagView/{tag}', [TagController::class, 'show'])->name('tag.view')->middleware('auth');
    Route::get('tagDelete/{tag}', [TagController::class, 'destroy'])->name('tag.delete')->middleware('auth');
});

/*-------------------------------------------------------
               TypeCategory Routes
-------------------------------------------------------*/

Route::prefix('_admin.typeCategories')->name('admin.')->group(function () {
    Route::get('typeCategory', [TypeCategoryController::class, 'index'])->name('typeCategories.index')->middleware('auth');
    Route::get('typeCategoryCreate', [TypeCategoryController::class, 'create'])->name('typeCategory.create')->middleware('auth');
    Route::post('typeCategories', [TypeCategoryController::class, 'store'])->name('typeCategories.store')->middleware('auth');
    Route::get('typeCategoryView/{typeCategory}', [TypeCategoryController::class, 'show'])->name('typeCategory.show')->middleware('auth');
    Route::get('typeCategoryEdit/{typeCategory}', [TypeCategoryController::class, 'edit'])->name('typeCategory.edit')->middleware('auth');
    Route::put('typeCategoryUpdate/{typeCategory}', [TypeCategoryController::class, 'update'])->name('typeCategory.update')->middleware('auth');
    Route::get('typeCategoryDelete/{typeCategory}', [TypeCategoryController::class, 'destroy'])->name('typeCategory.delete')->middleware('auth');
});

/* -----------------------------------------------
                    publication Routes
--------------------------------------------------*/
Route::prefix('_admin/publications')->name('admin.')->group(function () {
    Route::get('publication', [PublicationController::class, 'index'])->name('publication.index')->middleware('auth');
    Route::get('publicationCreate', [PublicationController::class, 'create'])->name('publication.create')->middleware('auth');
    Route::post('publicationStore', [PublicationController::class, 'store'])->name('publication.store')->middleware('auth');
    Route::get('publicationEdit/{publication}', [PublicationController::class, 'edit'])->name('publication.edit')->middleware('auth');
    Route::put('publicationUpdate/{publication}', [PublicationController::class, 'update'])->name('publication.update')->middleware('auth');
    Route::get('publicationView/{publication}', [PublicationController::class, 'show'])->name('publication.view')->middleware('auth');
    Route::get('publicationDelete/{publication}', [PublicationController::class, 'destroy'])->name('publication.delete')->middleware('auth');
});
/* -----------------------------------------------
                    video Routes
--------------------------------------------------*/
Route::prefix('_admin/videos')->name('admin.')->group(function () {
    Route::get('video', [VideoController::class, 'index'])->name('video.index')->middleware('auth');
    Route::get('videoCreate', [VideoController::class, 'create'])->name('video.create')->middleware('auth');
    Route::post('videoStore', [VideoController::class, 'store'])->name('video.store')->middleware('auth');
    Route::get('videoEdit/{video}', [videoController::class, 'edit'])->name('video.edit')->middleware('auth');
    Route::put('videoUpdate/{video}', [videoController::class, 'update'])->name('video.update')->middleware('auth');
    Route::get('videoView/{video}', [videoController::class, 'show'])->name('video.view')->middleware('auth');
    Route::get('videoDelete/{video}', [videoController::class, 'destroy'])->name('video.delete')->middleware('auth');
});
/* -----------------------------------------------
                    galery Routes
--------------------------------------------------*/
Route::prefix('_admin/galeries')->name('admin.')->group(function () {
    Route::get('galery', [GaleryController::class, 'index'])->name('galery.index')->middleware('auth');
    Route::get('galeryCreate', [GaleryController::class, 'create'])->name('galery.create')->middleware('auth');
    Route::post('galeryStore', [GaleryController::class, 'store'])->name('galery.store')->middleware('auth');
    Route::get('galeryEdit/{galery}', [GaleryController::class, 'edit'])->name('galery.edit')->middleware('auth');
    Route::put('galeryUpdate/{galery}', [GaleryController::class, 'update'])->name('galery.update')->middleware('auth');
    Route::get('galeryView/{galery}', [GaleryController::class, 'show'])->name('galery.view')->middleware('auth');
    Route::get('galeryDelete/{galery}', [GaleryController::class, 'destroy'])->name('galery.delete')->middleware('auth');
});

/*-------------------------------------------------------
                    Ads routes
-------------------------------------------------------*/

Route::prefix('_admin.ads')->name('admin.')->group(function () {
    Route::get('ads', [AdvertisementController::class, 'index'])->name('ads.index')->middleware('auth');
    Route::get('adsCreate', [AdvertisementController::class, 'create'])->name('ads.create')->middleware('auth');
    Route::post('ads', [AdvertisementController::class, 'store'])->name('ads.store')->middleware('auth');
    /* Route::get('categoryView/{category}', [AdvertisementController::class, 'show'])->name('category.show');
    Route::get('categoryEdit/{category}', [AdvertisementController::class, 'edit'])->name('category.edit');
    Route::put('categoryUpdate/{category}', [AdvertisementController::class, 'update'])->name('category.update');
    Route::get('categoryDelete/{category}', [AdvertisementController::class, 'destroy'])->name('category.delete'); */
});
/*-------------------------------------------------------
                    User routes
-------------------------------------------------------*/

Route::prefix('_admin.users')->name('admin.')->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index')->middleware('auth');
    Route::get('userCreate', [UserController::class, 'create'])->name('user.create')->middleware('auth');
    Route::post('userStore', [UserController::class, 'store'])->name('user.store')->middleware('auth');
    Route::get('userView/{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth');
    Route::get('userEdit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
    Route::put('userUpdate/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
    Route::get('userDelete/{user}', [UserController::class, 'destroy'])->name('user.delete')->middleware('auth');
});

/*-------------------------------------------------------
                    Auth routes
-------------------------------------------------------*/

Auth::routes();
Route::redirect('/home', '/admin');
Route::get('/admin', 'HomeController@index')->name('home')->middleware('auth');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('/pesquisa', [NewsController::class, 'search'])->name('news.search');


/*-------------------------------------------------------
                    School routes
-------------------------------------------------------*/
// Schools route
Route::prefix('_admin.schools')->name('admin.')->group(function () {
    Route::get('school', [SchoolController::class, 'School'])->name('school.listar');
    Route::get('schoolCreate', [SchoolController::class, 'create'])->name('school.create');
    Route::post('school', [SchoolController::class, 'store'])->name('school.store');
    Route::get('schoolEdit/{school}', [SchoolController::class, 'edit'])->name('school.edit');
    Route::put('schoolUpdate/{school}', [SchoolController::class, 'update'])->name('school.update');
    Route::get('schoolDelete/{school}', [SchoolController::class, 'destroy'])->name('school.destroy');
    Route::get('schoolView/{school}', [SchoolController::class, 'show'])->name('school.view');
});

/*-------------------------------------------------------
                    Province routes
-------------------------------------------------------*/
// Schools route
Route::prefix('_admin.provinces')->name('admin.')->group(function () {
    Route::get('province', [ProvinceController::class, 'index'])->name('province.listar');
    Route::get('provinceCreate', [ProvinceController::class, 'create'])->name('province.create');
    Route::post('province', [ProvinceController::class, 'store'])->name('province.store');
    Route::get('provinceEdit', [ProvinceController::class, 'edit'])->name('province.edit');
    Route::put('provinceUpdate/{province}', [ProvinceController::class, 'update'])->name('province.update');
    Route::get('provinceDelete/{province}', [ProvinceController::class, 'destroy'])->name('province.destroy');
    Route::get('provinceView/{province}', [ProvinceController::class, 'show'])->name('province.view');
});

/*-------------------------------------------------------
                    County routes
-------------------------------------------------------*/
// Schools route
Route::prefix('_admin.counties')->name('admin.')->group(function () {
    Route::get('county', [CountyController::class, 'index'])->name('county.listar');
    Route::get('countyCreate', [CountyController::class, 'create'])->name('county.create');
    Route::post('county', [CountyController::class, 'store'])->name('county.store');
    Route::get('countyEdit', [CountyController::class, 'edit'])->name('county.edit');
    Route::put('countyUpdate/{county}', [CountyController::class, 'update'])->name('county.update');
    Route::get('countyDelete/{county}', [CountyController::class, 'destroy'])->name('county.destroy');
    Route::get('countyView/{county}', [CountyController::class, 'show'])->name('county.view');
});

/*-------------------------------------------------------
                    Course routes
-------------------------------------------------------*/
// Schools route
Route::prefix('_admin.counties')->name('admin.')->group(function () {
    Route::get('course', [CourseController::class, 'index'])->name('course.listar');
    Route::get('courseCreate', [CourseController::class, 'create'])->name('course.create');
    Route::post('course', [CourseController::class, 'store'])->name('course.store');
    Route::get('courseEdit', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('courseUpdate/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::get('courseDelete/{course}', [CourseController::class, 'destroy'])->name('course.destroy');
    Route::get('courseView/{course}', [CourseController::class, 'show'])->name('course.view');
});

/*-------------------------------------------------------
                    Finalist routes
-------------------------------------------------------*/
// Finalist route
Route::prefix('_admin.finalists')->name('admin.')->group(function () {
    Route::get('finalist', [FinalistController::class, 'index'])->name('finalist.listar');
    Route::get('finalistCreate', [FinalistController::class, 'create'])->name('finalist.create');
    Route::post('finalistStore', [FinalistController::class, 'store'])->name('finalist.store');
    Route::get('finalistView/{finalist}', [FinalistController::class, 'show'])->name('finalist.view');
    Route::get('finalistEdit/{finalist}', [FinalistController::class, 'edit'])->name('finalist.edit');
    Route::put('finalistUpdate/{finalist}', [FinalistController::class, 'update'])->name('finalist.update');
    Route::get('finalistDelete/{finalist}', [FinalistController::class, 'destroy'])->name('finalist.delete');
});
