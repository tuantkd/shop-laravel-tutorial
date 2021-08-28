@extends('layout.layout_admin')
@section('title', 'Nhóm người dùng')

@section('content_admin')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Nhóm người dùng</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Nhóm người dùng</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bolder">
                                    <i class="ion ion-clipboard mr-1"></i> Danh Sách Nhóm
                                </h3>

                                <div class="card-tools">
                                    <a class="btn btn-primary btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelAddGroupUser">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-1 pb-0" id="tag_container">
                                @include('group_user.paginate_groupuser_result')
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </section>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modelAddGroupUser">
        <div class="modal-dialog" role="document">
            <form action="" id="FormAddGroupUser" method="post">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h5 class="modal-title font-weight-bolder">Thêm Nhóm Người Dùng</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên nhóm người dùng</label>
                            <input type="text" name="inputGroupUserName" id="inputGroupUserName" class="form-control" placeholder="Nhập tên nhóm">
                            <small id="errorGroupUserName" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="modal-footer p-2">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary btn-sm">Lưu lại</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $(document).on('click', '.page-link', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"{{ url('pagination-group-user') }}",
                    method:"POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{page:page},
                    success:function(data)
                    {
                        $('#tag_container').html(data);
                    }
                });
            }

        });
    </script>



    <script>
        $("#FormAddGroupUser").submit(function(e){
            e.preventDefault();

            let group_user_name = $("#inputGroupUserName").val();

            $.ajax({
                url: "{{ url('post-add-group-user-ajax') }}",
                type: "POST",
                data:{
                    group_user_name: group_user_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    document.getElementById('FormAddGroupUser').reset();
                    console.log("Dữ liệu: "+ JSON.stringify(response.data));
                },
                error: function(response) {
                    var error = response.responseJSON;
                    console.log("Lỗi trả về:" + JSON.stringify(error));

                    //Hiển thị lỗi trên thẻ html ẩn hiện
                    $('#errorGroupUserName').show();
                    $('#errorGroupUserName').text(response.responseJSON.errors.group_user_name);
                    setTimeout(function() {
                        $('#errorGroupUserName').hide();
                    }, 3000);
                }
            });
        });
    </script>

    @if(session()->has('message'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

@endsection
