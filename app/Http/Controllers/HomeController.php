<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //=============================================================================
    //Trang chủ
    public function index()
    {
        return view('home.index');
    }
    //=============================================================================


    //=============================================================================
    //Trang register
    public function page_register()
    {
        return view('page_register');
    }
    //=============================================================================



    //=============================================================================
    //Trang register
    public function page_login()
    {
        if (Auth::check()) {
            return redirect('/');
        }else{
            return view('page_login');
        }
    }

    //Trang register
    public function information_user_register($phone)
    {
        return view('infor_user_register', ['get_phone'=>$phone]);
    }

    //Hàm xử lý lấy dữ liệu vào CSDL
    public function post_user_register(Request $request)
    {
        //Ràng buộc dữ liệu
        $request->validate([
            'username' => 'unique:users,username' //table users column username
        ], [
            'username.unique' => 'Tên tài khoản này đã tồn tại!'
        ]);

        //Thêm mới vào CSDL
        $post_user = new User();
        $post_user->role_id = $request->input('role_id');
        $post_user->phone = $request->input('phone');
        $post_user->username = $request->input('username');
        $post_user->password = bcrypt($request->input('password'));
        $post_user->save();

        //Lấy ra thông tin người dùng
        $user_new = DB::table('users')->where('id', $post_user->id)->first();
        $user_phone = $user_new->phone;
        $user_password = $request->input('password');

        //Đăng nhập vào
        if (Auth::attempt(['phone' => $user_phone, 'password' => $user_password, 'role_id' => 2])) {
            return response()->json(['message'=>'Đăng ký thành công', 'data'=>$post_user]);
        }else{
            return redirect()->back();
        }
    }

    //Hàm xử lý
    public function post_login(Request $request)
    {
        $username = $request->input('inputUsername');
        $password = $request->input('inputPassword');

        if (Auth::attempt(['phone' => $username, 'password' => $password, 'group_user_id' => 2])) {
            return redirect('/');

        }elseif (Auth::attempt(['username' => $username, 'password' => $password, 'group_user_id' => 2])) {
            return redirect('/');

        }elseif (Auth::attempt(['email' => $username, 'password' => $password, 'group_user_id' => 2])) {
            return redirect('/');

        }else{
            return redirect()->back()->with('error_login_message', 'Số điện thoại hoặc tài khoản và mật khẩu sai!');
        }
    }
    //=============================================================================


    //=============================================================================
    //Chuyển hướng đến google
    public function redirect_google()
    {
        return Socialite::driver('google')->redirect();
    }

    //Gọi đến tài khoản google
    public function google_callback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){
                Auth::login($finduser);
                return redirect('/');
            }else{
                $newUser = new User();
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'avatar'=> $user->avatar_original,
                    'password' => bcrypt('123456')
                ]);
                Auth::login($newUser);
                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }


    //Chuyển hướng đến facebook
    public function redirect_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //Gọi đến tài khoản facebook
    public function facebook_callback()
    {
        try {

            $user_fb = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user_fb->id)->first();

            if($finduser){
                Auth::login($finduser);
                return redirect('/');
            }else{
                $newUser = new User();
                $newUser = User::create([
                    'name' => $user_fb->name,
                    'email' => $user_fb->email,
                    'facebook_id'=> $user_fb->id,
                    'avatar'=> $user_fb->avatar_original,
                    'password' => bcrypt('123456')
                ]);
                Auth::login($newUser);
                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //Gọi đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    //=============================================================================


    //=============================================================================
    //Hàm hiển thị chi tiết sản phẩm
    public function product_detail()
    {
        return view('home.product_detail');
    }
    //=============================================================================
}
