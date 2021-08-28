<?php

namespace App\Http\Controllers;

use App\Models\GroupUser;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class AdminController extends Controller
{
    //========================================================================
    //Hàm trang chủ admin
    public function index()
    {
        return view('admin.index');
    }
    //========================================================================



    //========================================================================
    //Hàm hiển thị nhóm người dùng
    public function page_group_user(Request $request)
    {
        $show_group_users = GroupUser::paginate(2);

        if ($request->ajax()) {
            return view('group_user.paginate_groupuser_result',['show_group_users'=>$show_group_users]);
        }

        return view('group_user.group_user',['show_group_users'=>$show_group_users]);
    }

    //Hàm phân trang AJAX nhóm người dùng
    public function pagination_group_user(Request $request)
    {
        if($request->ajax())
        {
            $show_group_users = GroupUser::paginate(2);
            return view('group_user.paginate_groupuser_result',['show_group_users'=>$show_group_users])->render();
        }
    }

    //Hàm hiển thị nhóm người dùng
    public function group_user_ajax(Request $request)
    {
        $this->validate($request, [
            'group_user_name'=>'required|unique:group_users,group_user_name'
        ],[
            'group_user_name.required'=>'Chưa nhập tên nhóm',
            'group_user_name.unique'=>'Tên nhóm đã tồn tại'
        ]);

        $add_group_user = new GroupUser();
        $add_group_user->group_user_name = $request->group_user_name;
        $add_group_user->save();

        return response()->json(['message'=>'Đã thêm nhóm người dùng', 'data'=>$add_group_user]);
    }

    //Hàm cập nhật nhóm người dùng
    public function update_group_user(Request $request, $id)
    {
        $update_group_user = GroupUser::find($id);
        $update_group_user->group_user_name = $request->input('inputEditGroupUserName');
        $update_group_user->save();

        return redirect()->back()->with('message', 'Đã cập nhật nhóm người dùng');
    }
    //========================================================================
}
