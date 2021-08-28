<table>
    <thead>
    <tr>
        <th style="width:5%;">STT</th>
        <th style="width:85%;">Tên nhóm người dùng</th>
        <th style="width:10%;"></th>
    </tr>
    </thead>
    <tbody>
        @foreach($show_group_users as $key => $show_group_user)
            <tr>
                <td data-label="STT">{{ ++$key }}</td>
                <td data-label="Tên nhóm người dùng">{{ $show_group_user->group_user_name }}</td>
                <td>
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modelEditGroupUser-{{ $show_group_user->id }}">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>
            </tr>


            <!-- Modal-Edit-Group-User-->
            <div class="modal fade" id="modelEditGroupUser-{{ $show_group_user->id }}">
                <div class="modal-dialog" role="document">
                    <form action="{{ url('update-group-user/'.$show_group_user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header p-2">
                                <h5 class="modal-title font-weight-bolder">Chỉnh Sửa Nhóm Người Dùng</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Tên nhóm người dùng</label>
                                    @php($get_id = DB::table('group_users')->where('id', isset($show_group_user->id))->first())
                                    <input type="text" name="inputEditGroupUserName" class="form-control" value="{{ $get_id->group_user_name }}">
                                </div>
                            </div>
                            <div class="modal-footer p-2">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-Edit-Group-User-->

        @endforeach
    </tbody>
</table>

<ul class="pagination justify-content-end pagination-sm mt-2 p-0 mb-1">
    {!! $show_group_users->links('pagination::bootstrap-4') !!}
</ul>





