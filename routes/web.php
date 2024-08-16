<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\RatingController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
//Home
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/collection',[HomeController::class,'getCollection'])->name('collection');
Route::get('/shoes',[HomeController::class,'getShoes'])->name('shoes');
Route::get('/shoes/{id_caterogy}',[HomeController::class,'getShoesByCaterogy'])->name('shoes_by_caterogy');
Route::get('/upload',[HomeController::class,'getUpload'])->name('upload');
Route::post('/upload',[HomeController::class,'postUpload'])->name('postupload');

//chi tiet san pham

Route::get('info_product/{id}',[ProductController::class,'getInfoProduct'])->name('infoProduct');
Route::get('ratings/{id}/{star}',[ProductController::class,'getRatings'])->name('getRatings');
Route::post('info_product/{id}',[ProductController::class,'postProduct'])->name('postProduct');
Route::get('delete_cart/{id}',[ProductController::class,'getDeleteCart'])->name('DelectCart');
Route::get('update_cart/{id}/{soluong}',[ProductController::class,'getUpdateNumberCart'])->name('UpdateNumberCart');



//Admin-Users
Route::get('/admin', [AdminController::class,'getAdmin'])->name('getAdmin');
Route::post('/admin', [AdminController::class,'postAdmin'])->name('postAdmin');
Route::get('/edit_user/{id}', [AdminController::class,'getEditUser'])->name('getEditUser');
Route::post('/edit_user', [AdminController::class,'postEditUser'])->name('postEditUser');
Route::get('/delete/{id}', [AdminController::class,'getDeleteUser'])->name('getDeleteUser');
Route::get('/logout', [AdminController::class,'getLogout'])->name('getLogout');
Route::post('/add_user', [AdminController::class,'addUserByAdmin'])->name('adduser_byadmin');
Route::get('/lock/{username}', [AdminController::class,'handleStatementUser'])->name('getLock');
Route::get('/unlock/{username}', [AdminController::class,'handleStatementUser'])->name('getUnLock');
//Admin-Caterogy
Route::get('/caterogy',[AdminController::class,'getCaterogy'])->name('Caterogy');
Route::post('/add_caterogy',[AdminController::class,'addCaterogy'])->name('add_Caterogy');
Route::get('/edit_caterogy/{id}', [AdminController::class,'getEditCaterogy'])->name('edit_Caterogy');
Route::post('/edit_caterogy', [AdminController::class,'postEditCaterogy'])->name('postEditCaterogy');
Route::get('/delete_caterogy/{id}',[AdminController::class,'getDeleteCaterogy'])->name('DeleteCaterogy');
//Admin-product
Route::get('/product',[AdminController::class,'getProduct'])->name('adminProduct');
Route::post('/add_product', [AdminController::class,'addProductByAdmin'])->name('addproduct_byadmin');
Route::get('/delete_product/{id}',[AdminController::class,'getDeleteProduct'])->name('DeleteProduct');
Route::get('/edit_product/{id}',[AdminController::class,'getEditProduct'])->name('EditProduct');
Route::post('/edit_product', [AdminController::class,'postEditProduct'])->name('postEditProduct');

//Admin-Order
Route::get('/admin_order',[AdminController::class,'getOrder'])->name('adminOrder');
Route::get('/delete_order/{id}', [AdminController::class,'getDeleteUserOrder'])->name('DeleteOrder');
Route::post('/delete_order_send_mail', [AdminController::class,'postDeleteUserOrder'])->name('postDeleteOrder');
Route::get('/edit_order/{id}', [AdminController::class,'getEditOrder'])->name('EditOrder');
Route::post('/edit_order', [AdminController::class,'postEditOrder'])->name('postEditOrder');
//Login-Signup
Route::get('/login',[UsersController::class,'getLogin'])->name('login');
Route::post('/login',[UsersController::class,'postLogin'])->name('postLogin');
Route::get('/signup',[UsersController::class,'getSignUp'])->name('signup');
Route::post('/signup',[UsersController::class,'postSignUp'])->name('postSignUp');
Route::get('/forgotpass',[UsersController::class,'getForgotPass'])->name('ForgotPass');
Route::post('/forgotpass',[UsersController::class,'postForgotPass'])->name('postForgotPass');

Route::get('/infouser',[UsersController::class,'infoUser'])->name('infoUser');
Route::post('/infouser',[UsersController::class,'postinfoUser'])->name('postinfoUser');
Route::get('/log_out',[UsersController::class,'getLogOut'])->name('LogOut');
Route::get('/cart',[UsersController::class,'getCart'])->name('Cart');
Route::get('/pay',[UsersController::class,'getPay'])->name('Pay');
Route::post('/pay',[UsersController::class,'postPay'])->name('postPay');
Route::get('/detail_order/{id}',[UsersController::class,'getDetailOrder'])->name('DetailOrder');
Route::post('/detail_order/{id}',[UsersController::class,'postDetailOrder'])->name('postDetailOrder');
Route::get('/detail_order/{id}',[UsersController::class,'getDetailOrder'])->name('DetailOrder');
Route::get('/huydon/{id}', [UsersController::class,'getHuyDon'])->name('HuyDon');

//Route::post('/donhang',[UsersController::class,'donhang'])->name('donhang');
// Route::post('//{flag}',[UsersController::class,'postPay'])->name('postPay');
Route::get('/listorder',[UsersController::class,'getListOrder'])->name('ListOder');
Route::post('/listorder',[UsersController::class,'postListOrder'])->name('postListOder');
Route::get('/deital_order/{id}',[UsersController::class,'getDetailOrder'])->name('DetailOrder');
Route::post('/deital_order/{id}',[UsersController::class,'postDetailOrder'])->name('postDetailOrder');
Route::get('/thanks',[UsersController::class,'getThanks'])->name('Thanks');
Route::get('/create_order',[UsersController::class,'getCreate_Order'])->name('CreateOrder');
Route::post('/create_order',[UsersController::class,'postCreate_Order'])->name('postCreateOrder');
Route::post('/giohang',[UsersController::class,'postGioHang'])->name('postGioHang');

//Mail

Route::get('/sendmail',[SendMailController::class,'sendmail'])->name('sendmail');
Route::get('/sendmailsorry',[SendMailController::class,'sendmailsorry'])->name('sendmailsorry');
Route::get('/mail',[UsersController::class,'mail'])->name('mail');


//xac thuc tk email

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');




//danhgia
Route::get('/rates',[AdminController::class,'getRatings'])->name('getRatings');
Route::get('/delete_rating/{id}',[AdminController::class,'getDeleteRating'])->name('DeleteRating');
Route::post('ajax/danh_gia/{id}',[RatingController::class, 'saveRating'])->name('post.rating.product');
