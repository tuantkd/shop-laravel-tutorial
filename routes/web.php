<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Middleware\CheckLogin;
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
//=============== TRANG CHỦ NGOÀI SITE ========================================================
//Trang chủ
Route::get('/', [HomeController::class, 'index']);


//Trang đăng ký
Route::get('page-register', [HomeController::class, 'page_register']);

//Trang nhập thông tin người dùng đăng ký
Route::get('information-user-register/{phone}', [HomeController::class, 'information_user_register']);

//Lấy thông tin người dùng đăng ký vào CSDL
Route::post('post-user-register', [HomeController::class, 'post_user_register']);

//Trang đăng nhập
Route::get('page-login', [HomeController::class, 'page_login']);

//Gọi đến hàm xử lý
Route::post('post-login', [HomeController::class, 'post_login']);

//Đăng xuất
Route::get('logout', [HomeController::class, 'logout']);

//Login google
Route::get('login/google', [HomeController::class, 'redirect_google']);
Route::get('login/google/callback', [HomeController::class, 'google_callback']);

//Login facebook
Route::get('login/facebook', [HomeController::class, 'redirect_facebook']);
Route::get('login/facebook/callback', [HomeController::class, 'facebook_callback']);

//Chi tiết sản phẩm
Route::get('product-detail', [HomeController::class, 'product_detail']);
//=============== TRANG CHỦ NGOÀI SITE ========================================================









//=============== TRANG QUẢN TRỊ ========================================================
//Trang chủ admin
Route::get('admin', [AdminController::class, 'index']);

//Trang hiển thị nhóm người dùng
Route::get('page-group-user', [AdminController::class, 'page_group_user']);

//Phân trang nhóm người dùng
Route::post('pagination-group-user', [AdminController::class, 'pagination_group_user']);

//Thên nhóm người dùng AJAX
Route::post('post-add-group-user-ajax', [AdminController::class, 'group_user_ajax']);

//Cập nhật nhóm người dùng AJAX
Route::put('update-group-user/{id}', [AdminController::class, 'update_group_user']);
//=============== TRANG QUẢN TRỊ ========================================================


