<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" type = "image/png" href = "{{ asset('public/home/icon/icon-title.gif') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .navbar {
            background-color: #0082fa;
            padding: 2px;
        }
        .logo-site {
            max-width: 100%;
            height: 50px;
        }
        .collapse .input-group {
            width: 82%;
        }
        .collapse .input-group input {
            outline: none;
            border: 1px solid white;
        }
        .collapse .input-group .input-group-append button {
            outline: none;
            border: none;
            background-color: white;
        }
        .collapse .text-options {
            width: 400px;
            float: right;
        }
        .collapse .text-options .navbar-nav .nav-item .nav-link i {
            font-size: 20px;
        }

        nav {
            display: block;
        }

        /* FOOTER */
        .site-footer {
            background-color: #0082fa;
            padding: 45px 0 20px;
            font-size: 15px;
            line-height: 24px;
            color: white;
            margin-top:20px;
        }
        .site-footer hr {
            border-top-color: white;
            opacity: 0.5;
        }
        .site-footer hr.small {
            margin: 20px 0;
        }
        .site-footer h6 {
            color: white;
            font-size: 16px;
            font-weight: bolder;
            text-transform: uppercase;
            margin-top: 5px;
            letter-spacing: 2px;
        }
        .site-footer a {
            color: white;
        }
        .site-footer a:hover {
            color: #3366cc;
            text-decoration: none;
        }
        .footer-links {
            padding-left: 0;
            list-style: none;
        }
        .footer-links li {
            display: block;
        }
        .footer-links a {
            color: white;
        }
        .footer-links a:active,
        .footer-links a:focus,
        .footer-links a:hover {
            color: #2d3748;
            text-decoration: none;
        }
        .footer-links.inline li {
            display: inline-block;
        }
        .site-footer .social-icons {
            text-align: right;
        }
        .site-footer .social-icons a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin-left: 6px;
            margin-right: 0;
            border-radius: 100%;
            background-color: #33353d;
        }
        .copyright-text {
            margin: 0;
        }
        @media (max-width:991px) {
            .site-footer [class^=col-] {
                margin-bottom: 30px;
            }
        }
        @media (max-width:767px) {
            .site-footer {
                padding-bottom: 0;
            }
            .site-footer .copyright-text,
            .site-footer .social-icons {
                text-align: center;
            }
        }
        .social-icons {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }
        .social-icons li {
            display: inline-block;
            margin-bottom: 4px;
        }
        .social-icons li.title {
            margin-right: 15px;
            text-transform: uppercase;
            color: #96a2b2;
            font-weight: 700;
            font-size: 13px;
        }
        .social-icons a {
            background-color: #eceeef;
            color: white;
            font-size: 16px;
            display: inline-block;
            line-height: 44px;
            width: 44px;
            height: 44px;
            text-align: center;
            margin-right: 8px;
            border-radius: 100%;
            -webkit-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }
        .social-icons a:active,
        .social-icons a:focus,
        .social-icons a:hover {
            color: #fff;
            background-color: #29aafe;
        }
        .social-icons.size-sm a {
            line-height: 34px;
            height: 34px;
            width: 34px;
            font-size: 14px;
        }
        .social-icons a.facebook:hover {
            background-color: #3b5998;
        }
        .social-icons a.twitter:hover {
            background-color: #00aced;
        }
        .social-icons a.linkedin:hover {
            background-color: #007bb6;
        }
        .social-icons a.dribbble:hover {
            background-color: #ea4c89;
        }
        @media (max-width:767px) {
            .social-icons li.title {
                display: block;
                margin-right: 0;
                font-weight: 600;
            }
        }


        /*ICON-USER*/
        .icon-user{
            width: 30px;
            height: 30px;
            border-radius: 10px;
        }
        /*ICON-USER*/


        /*MENU DROPDOWN*/
        .dropbtn {
            color: white;
            font-size: 16px;
            border: none;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 150px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            left: 22%;
        }
        .dropdown-content a {
            color: black;
            padding: 8px 10px;
            text-decoration: none;
            display: block;
            border-radius: 5px;
        }
        .dropdown-content a:hover {background-color: #ddd;}
        .dropdown:hover .dropdown-content {display: block;border-radius: 5px;}
        /*MENU DROPDOWN*/
    </style>
</head>
<body style="background-color: #f5f8fd; font-family: 'Roboto', sans-serif;">

<!-- Header -->
<nav class="navbar navbar-expand-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('public/home/logo/web-shop.gif') }}" class="img-fluid logo-site" alt="Logo-site">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Bạn cần tìm gì ?">
                <div class="input-group-append">
                    <button class="btn btn-light" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="text-options">
                <ul class="navbar-nav justify-content-end">
                    @if (Auth::check())
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link text-light dropbtn" href="#">
                                    @if (Auth::user()->avatar != null)
                                        <img src="{{ Auth::user()->avatar }}" alt="icon-avatar" class="icon-user">
                                    @else
                                        <img src="{{ asset('public/home/logo/icon-user.png') }}" alt="icon-avatar" class="icon-user">
                                    @endif

                                    @if (Auth::user()->google_id != null ||  Auth::user()->facebook_id != null)
                                        {{ Str::limit(Auth::user()->name, 15, '...') }}
                                    @else
                                        {{ Str::limit(Auth::user()->username, 15, '...') }}
                                    @endif

                                </a>
                                <div class="dropdown-content">
                                    <a href="#"><i class="fa fa-user"></i> Thông tin</a>
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Đơn hàng</a>
                                    <a href="#" data-toggle="modal" data-target="#modelLogout">
                                        <i class="fa fa-sign-out"></i> Đăng xuất
                                    </a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ url('page-register') }}"><i class="fa fa-user"></i> Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ url('page-login') }}"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Header -->

<!-- Modal Logout -->
<div class="modal fade" id="modelLogout">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <b style="font-size: 20px;">Bạn có muốn đăng xuất không ?</b>
            </div>
            <div class="modal-footer p-1">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                <a href="{{ url('logout') }}" class="btn btn-primary btn-sm">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Logout -->



<!-- Container -->
@yield('content')
<!-- Container -->



<!-- Site footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <img src="{{ url('public/home/logo/web-shop.gif') }}" class="img-fluid" alt="Logo-site" style="max-width:100%; height:50px">
                <p class="text-justify">
                    <b>Shop.vn</b>
                    - Website thương mại điện tử Shop.vn là sở hữu của Công ty TNHH Thương mại do Công ty phát triển,
                    hoạt động và vận hành với tên miền giao dịch là www.Shop.vn (sau đây gọi là Website). Đối tượng phục vụ là tất cả các khách hàng có nhu cầu mua hàng,
                    đặt hàng thông qua website thương mại điện tử.
                </p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Loại sản phẩm</h6>
                <ul class="footer-links">
                    <li>
                        <a href="http://scanfcode.com/category/c-language/">Điện thoại</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/category/front-end-development/">Laptop</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/category/back-end-development/">Phụ kiện</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/category/java-programming-language/">Âm thanh</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/category/android/">Camera</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/category/templates/">Quay phim</a>
                    </li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Các quy định</h6>
                <ul class="footer-links">
                    <li>
                        <a href="http://scanfcode.com/about/">Quy chế hoạt động</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/contact/">Chính sách bảo hành</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/contribute-at-scanfcode/">Tuyển dụng</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/privacy-policy/">Tra thông tin đơn hàng</a>
                    </li>
                    <li>
                        <a href="http://scanfcode.com/sitemap/">Tra thông tin bảo hành</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
                    <a href="#">Shop.vn</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li>
                        <a class="facebook" href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dribbble" href="#">
                            <i class="fa fa-dribbble"></i>
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" href="#">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
