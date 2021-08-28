@extends('layout.layout_home')
@section('title', 'Thông tin người dùng đăng ký')

@section('content')

    <style>
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


        /* The message box is shown when the user clicks on the password field */
        #message {
            display:none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 15px;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-radius: 5px;
        }

        #message p {
            padding: 5px 20px;
            font-size: 15px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -22px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -22px;
            content: "✖";
        }

    </style>

    <div class="container" style="margin-top: 7%">
        <div class="col-lg-6 offset-lg-3 col-12">
            <div class="card">
                <div class="card-body p-4">
                    <h3 class="mb-4">Thông tin người dùng</h3>

                    <div class="text-center mb-4">
                        <small class="text-danger" id="usernameError"></small>
                    </div>

                    <form class="needs-validation" novalidate id="RegisterForm">

                        <!--Quyền truy cập hệ thống-->
                        <input type="hidden" name="inputRoleID" id="inputRoleID" value="2">

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone" style="font-size: 22px;"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputPhone" readonly value="{{ $get_phone }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" style="font-size: 22px;"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nhập tên tài khoản" required name="inputUsername" id="inputUsername">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3" id="show_hide_password">
                                <div class="input-group-prepend">
                                    <a href="#" class="input-group-text" id="btn-eye-pass" style="text-decoration:none;"><i class="fa fa-eye-slash"></i></a>
                                </div>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu" required name="inputPassword" id="inputPassword"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên">
                            </div>
                        </div>

                        <div id="message">
                            <h5>Mật khẩu phải chứa những điều sau:</h5>
                            <p id="letter" class="invalid">Có chữ cái viết <b>Thường</b></p>
                            <p id="capital" class="invalid">Có chữ cái viết <b>Hoa</b></p>
                            <p id="number" class="invalid">Có ký tự <b>Số</b></p>
                            <p id="length" class="invalid">Có ít nhất <b>8 Ký tự</b></p>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg" disabled id="btn_submit">GỬI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $("#inputUsername").keypress(function(event){
                let ew = event.which;
                console.log(ew);
                if(ew == 32)
                    return true;
                if(48 <= ew && ew <= 57)
                    return true;
                if(65 <= ew && ew <= 90)
                    return true;
                if(97 <= ew && ew <= 122)
                    return true;
                return false;
            });
        });
    </script>

    <script>
        $("#RegisterForm").submit(function(e){

            e.preventDefault();

            let phone = $("#inputPhone").val();
            let name = $("#inputUsername").val();
            let pass = $("#inputPassword").val();
            let role = $("#inputRoleID").val();

            console.log("Dữ liệu form: " + JSON.stringify(phone) );
            console.log("Dữ liệu form: " + JSON.stringify(name) );
            console.log("Dữ liệu form: " + JSON.stringify(pass) );
            console.log("Dữ liệu form: " + JSON.stringify(role) );

            $.ajax({
                url: "{{ url('post-user-register') }}",
                type: "POST",
                data:{
                    role_id: role,
                    phone: phone,
                    username: name,
                    password: pass,
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

                    setTimeout(location.href = '{{ url('/') }}', 3000);

                    console.log("Dữ liệu: "+ JSON.stringify(response.data));
                },
                error: function(response) {
                    //$('#usernameError').text(response.responseJSON.errors.username);
                    var error = response.responseJSON;
                    console.log("Lỗi trả về:" + JSON.stringify(error));

                    //Hiển thị lỗi trên thẻ html ẩn hiện
                    $('#usernameError').show();
                    $('#usernameError').text(response.responseJSON.errors.username);
                    setTimeout(function() {
                        $('#usernameError').hide();
                    }, 3000);
                }
            });
        });
    </script>






    <script>
        var myInput = document.getElementById("inputPassword");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if(myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }

            if (
                myInput.value.match(lowerCaseLetters) &&
                myInput.value.match(upperCaseLetters) &&
                myInput.value.match(numbers) &&
                myInput.value.length >= 8
            ){
                document.getElementById("btn_submit").disabled = false;
            }
        }
    </script>


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

