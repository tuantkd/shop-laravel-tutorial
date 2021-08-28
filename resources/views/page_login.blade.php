@extends('layout.layout_home')
@section('title', 'Đăng nhập')

@section('content')

    <style>
        .btn-info{
            background-color: #2d83f3;
        }
        #register-fb .img-fb img{
            width: 30px;
            height: 30px;
        }

        #register-fb .p-0 div{
            padding: 2px 20px;
            text-align: center;
        }

        #register-gg .img-gg img{
            width: 30px;
            height: 30px;
        }

        #register-gg .p-0 div{
            padding: 2px 20px;
            text-align: center;
        }

        .card{
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        #show_hide_password .input-group-addon #btn-eye-pass{
            border-bottom-left-radius: unset;
            border-top-left-radius: unset;
        }
    </style>

    <div class="container" style="margin-top: 6%">
        <div class="col-lg-6 offset-lg-3 col-12">
            <div class="card">
                <div class="card-body p-4">
                    <h3>Đăng nhập</h3>
                    <form action="{{ url('post-login') }}" class="needs-validation" novalidate method="post">
                        <!--Mã token bảo vệ khi truyền dữ liệu đến server-->
                        @csrf

                        <div class="form-group mt-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="inputUsername"
                                placeholder="Email/Số điện thoại/Tên tài khoản" name="inputUsername" required>
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-lg" type="submit"><i class="fa fa-user"></i></button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group" id="show_hide_password">
                                <input class="form-control form-control-lg" type="password" id="inputPassword" placeholder="Mật khẩu" name="inputPassword" required>
                                <div class="input-group-addon">
                                    <a href="#" class="btn btn-info btn-lg pl-2" id="btn-eye-pass"><i class="fa fa-eye-slash"></i></a>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg">ĐĂNG NHẬP</button>

                        <hr>

                        <div class="form-group row">
                            <div class="col-lg-6 col-12">
                                <a href="{{ url('login/facebook') }}" class="btn btn-info btn-block" role="button">
                                    <div class="d-flex flex-row" id="register-fb">
                                        <div class="p-0 img-fb">
                                            <img src="{{ url('public/home/logo/fb.png') }}" alt="FB">
                                        </div>
                                        <div class="p-0"><div>Facebook</div></div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-12">
                                <a href="{{ url('login/google') }}" class="btn btn-danger btn-block" role="button">
                                    <div class="d-flex flex-row" id="register-gg">
                                        <div class="p-0 img-gg">
                                            <img src="{{ url('public/home/logo/gg.png') }}" alt="FB">
                                        </div>
                                        <div class="p-0"><div>Google</div></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="form-group mt-4 text-center">
                            <span class="text-muted">Bạn có biết Shop.vn ?</span>
                            <a href="{{ url('page-register') }}" style="text-decoration: none;">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('error_login_message'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ session()->get('error_login_message') }}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif


    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on("click", function (event) {
                event.preventDefault();
                if ($("#show_hide_password input").attr("type") == "text") {
                    $("#show_hide_password input").attr("type", "password");
                    $("#show_hide_password i").addClass("fa-eye-slash");
                    $("#show_hide_password i").removeClass("fa-eye");
                } else if ($("#show_hide_password input").attr("type") == "password") {
                    $("#show_hide_password input").attr("type", "text");
                    $("#show_hide_password i").removeClass("fa-eye-slash");
                    $("#show_hide_password i").addClass("fa-eye");
                }
            });
        });
    </script>


    <script>
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

@endsection

