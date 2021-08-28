@extends('layout.layout_home')
@section('title', 'Đăng ký')

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
    </style>

    <div class="container" style="margin-top: 6%">
        <div class="col-lg-6 offset-lg-3 col-12">

            <div class="card" id="card-phone">
                <div class="card-body p-4">
                    <h3>Đăng ký</h3>
                    <form action="#" class="needs-validation" novalidate>

                        <div class="form-group mt-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="number" placeholder="VD: +84 326827373"
                                required onchange="get_phone();">
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-lg" type="submit"><i class="fa fa-phone"></i></button>
                                </div>
                            </div>
                        </div>

                        <div id="recaptcha-container"></div>
                        <br>

                        <button type="button" class="btn btn-primary btn-block btn-lg" onclick="phoneAuth();" id="btn-send">Đăng ký ngay</button>

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
                            <span class="text-muted">Bạn đã có tài khoản ?</span>
                            <a href="{{ url('page-login') }}" style="text-decoration: none;">Đăng nhập</a>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card" id="card-verification-code">
                <div class="card-body p-4">
                    <h3>Mã xác nhận</h3>
                    <form action="#" class="needs-validation" novalidate>
                        <div class="form-group mt-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="verificationCode" placeholder="Mã xác nhận" required>
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-lg" type="submit"><i class="fa fa-key"></i></button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-block btn-lg" onclick="codeverify();">Xác nhận</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
        function get_phone() {
            let number_phone = document.getElementById('number').value;
            let phone_not_zero = number_phone.substring(1, 10);
            let phone_final = "+84" + phone_not_zero;
            document.getElementById('number').value = phone_final;
            console.log('Phone:'+ phone_final);
        }
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

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script>

        document.getElementById('card-verification-code').style.display = "none";
        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyDBKIWVH0oQp2mxIjWbaeKWdKxtdJPAs5o",
            authDomain: "laravel-shop-d13cc.firebaseapp.com",
            projectId: "laravel-shop-d13cc",
            storageBucket: "laravel-shop-d13cc.appspot.com",
            messagingSenderId: "836336022429",
            appId: "1:836336022429:web:c8bd068a7bb195154a7574",
            measurementId: "G-XMQH48GKRC"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        window.onload=function () {
            render();
        };
        function render() {
            window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
        function phoneAuth() {
            //get the number
            var number = document.getElementById('number').value;
            //phone number authentication function of firebase
            //it takes two parameter first one is number,,,second one is recaptcha
            firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
                //s is in lowercase
                window.confirmationResult=confirmationResult;
                coderesult=confirmationResult;
                console.log(coderesult);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đã gửi mã xác nhận đến ' + number,
                    showConfirmButton: false,
                    timer: 1500
                });
            }).catch(function (error) {
                alert(error.message);
            });

            if (number !== ''){
                document.getElementById('card-phone').style.display = "none";
                document.getElementById('card-verification-code').style.display = "block";
            }
        }

        function codeverify() {
            let code = document.getElementById('verificationCode').value;

            let get_number_phone = document.getElementById('number').value;
            let phone_not_zero = get_number_phone.substring(3, 13);
            let phone_final_get = "0" + phone_not_zero;

            console.log('Phone get :'+ phone_final_get);

            coderesult.confirm(code).then(function (result) {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đã xác nhận thành công',
                    showConfirmButton: false,
                    timer: 3000
                });

                setTimeout(location.href = '{{ url('information-user-register') }}' + '/' + phone_final_get, 4000);

                let user=result.user;
                console.log(user);
            }).catch(function (error) {
                alert(error.message);
            });
        }
    </script>

@endsection

