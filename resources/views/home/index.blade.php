@extends("layout.layout_home")

@section('title', 'Trang chủ')
@section('content')

    <style>
        #mainnav {
            margin-top: 60px;
            margin-bottom: 10px;
            padding: 1px 2px;
            width: 200px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            border-radius: 5px;
            background-color: white;
        }
        #mainnav ul {
            list-style: none;
            margin: 10px;
            padding: 0;
        }
        #mainnav > ul > li {
            display: inline-block;
            padding: 1px;
        }
        #mainnav ul li {
            position: relative;
        }
        .header #mainnav > ul > li > a {
            line-height: 100px;
        }
        #mainnav > ul > li.home > a {
            color: #18ba60;
        }
        #mainnav > ul > li > a {
            position: relative;
            display: block;
            font-family: "Roboto", sans-serif;
            color: #222;
            width: 200px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bolder;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        #mainnav > ul > li > a:hover {
            color: #718096;
            width: 200px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bolder;
        }
        #mainnav ul.submenu {
            position: absolute;
            left: 190px;
            top: -50px;
            width: 200px;
            text-align: left;
            background-color: white;
            z-index: 9999;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            border-radius: 5px;
            -ms-filter:  "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)""
            filter: alpha(opacity=0);
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        #mainnav ul.submenu li:first-child {
            border-top: none;
        }
        #mainnav ul li ul li {
            margin-left: 10px;
        }
        #mainnav ul.submenu > li > a {
            display: block;
            color: black;
            font-family: "Roboto", sans-serif;
            color: #222;
            text-decoration: none;
            line-height: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        #mainnav ul.submenu > li > a:hover {
            color: #718096;
            text-decoration: none;
            line-height: 30px;
        }
        #mainnav ul li:hover > ul.submenu {
            top: -20px;
            left: 180px;
            -ms-filter:  "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)""
            filter: alpha(opacity=100);
            opacity: 1;
            visibility: visible;
        }

        #slider_carousel {
            margin-top: 60px;
            margin-left: 14px;
        }
        #slider_carousel .carousel-inner .carousel-item img {
            border-radius: 5px;
            width: 1000px;
            height: 226px;
        }

        .container .row .quangcao {
            margin-top: 20px;
            padding-top: 20px;
            padding-left: 2px;
        }

        .container .row .col-lg-2 img {
            width: 100%;
            margin-top: 20px;
            margin-bottom: -14px;
            max-width: 1000px;
            height: 71px;
            border-radius: 5px;
        }

        .row .col-lg-3 .card {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }

        .row .col-lg-3 .card img {
            max-width 100%;
            height: 30px;
        }

        .phone-new {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            margin-top: 10px;
        }

        .phone-new .card-body .row .col-12 .card-group .card {
            border-radius: unset;
            margin: 5px;
            transition: box-shadow 0.3s;
            border: 1px solid #ccc;
            background: #fff;
        }

        .phone-new .card-body .row .col-12 .card-group .card:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            border-radius: 5px;
        }

        .card-group .card .card-img-top{
            max-width: 230px;
            width: 100%;
            height: 204.5px;
            text-decoration: line-through;
        }
        .card-group .card .card-body .card-text .line-through{
            text-decoration: line-through;
        }

        .category-all {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            margin-top: 10px;
        }

        .category-all .card-body{
            background-color: #eeeeee;
            padding-top: 5px;
        }

        .category-all .card-body .row .col-lg-2 .image-icon-category{
            opacity: .7;
        }

        .category-all .card-body .row .col-lg-2 .image-icon-category:hover{
            -ms-transform: scale(1.1); /* IE 9 */
            -webkit-transform: scale(1.1); /* Safari 3-8 */
            transform: scale(1.1);
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            opacity: unset;
        }
    </style>


    <div class="container" style="margin-top:30px">
        <!-- Category-slider-->
        <div class="row">
            <div class="col-lg-2">
                <nav id="mainnav" class="mainnav">
                    <ul class="menu">
                        <li>
                            <a href="#">
                                <div class="d-flex">
                                    <div class="p-1">
                                        <i class="fa fa-mobile" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="pt-2 pl-2">Services</div>
                                </div>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="services.html">Services</a>
                                </li>
                                <li>
                                    <a href="services-single.html">Services Single</a>
                                </li>
                            </ul>
                            <!-- /.submenu -->
                        </li>
                        <li>
                            <a href="services.html">
                                <div class="d-flex">
                                    <div class="p-1">
                                        <i class="fa fa-laptop" style="font-size: 20px;"></i>
                                    </div>
                                    <div class="pt-2 pl-2">Laptop,PC, Màn hình</div>
                                </div>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="services.html">Yeal1</a>
                                </li>
                                <li>
                                    <a href="services-single.html">Single</a>
                                </li>
                            </ul>
                            <!-- /.submenu -->
                        </li>
                        <li>
                            <a href="services.html">
                                <div class="d-flex">
                                    <div class="p-1">
                                        <i class="fa fa-tablet" style="font-size: 22px;"></i>
                                    </div>
                                    <div class="pt-2 pl-2">Tablet</div>
                                </div>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="services.html">Yeal1</a>
                                </li>
                                <li>
                                    <a href="services-single.html">Single</a>
                                </li>
                            </ul>
                            <!-- /.submenu -->
                        </li>
                        <li>
                            <a href="services.html">
                                <div class="d-flex">
                                    <div class="p-1">
                                        <i class="fa fa-music"></i>
                                    </div>
                                    <div class="pt-2 pl-2">Music</div>
                                </div>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="services.html">Yeal1</a>
                                </li>
                                <li>
                                    <a href="services-single.html">Single</a>
                                </li>
                            </ul>
                            <!-- /.submenu -->
                        </li>
                        <li>
                            <a href="services.html">
                                <div class="d-flex">
                                    <div class="p-1">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="pt-2 pl-2">Đồng hồ</div>
                                </div>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="services.html">Yeal1</a>
                                </li>
                                <li>
                                    <a href="services-single.html">Single</a>
                                </li>
                            </ul>
                            <!-- /.submenu -->
                        </li>
                        <li>
                            <a href="services.html">
                                <div class="d-flex">
                                    <div class="p-1">
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                    <div class="pt-2 pl-2">Phụ kiện</div>
                                </div>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="services.html">Yeal1</a>
                                </li>
                                <li>
                                    <a href="services-single.html">Single</a>
                                </li>
                            </ul>
                            <!-- /.submenu -->
                        </li>
                    </ul>
                    <!-- /.menu -->
                </nav>
            </div>
            <div class="col-sm-8">
                <div id="slider_carousel" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ url('public/home/images/banner-1.jpg') }}" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('public/home/images/banner-2.jpg') }}" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('public/home/images/banner-3.png') }}" alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#slider_carousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#slider_carousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
            <div class="col-lg-2 quangcao">
                <img
                    src="{{ url('public/home/images/banner-4.jpg') }}"
                    class="img-fluid"
                    alt="Quang cao">
                <img
                    src="{{ url('public/home/images/banner-5.jpg') }}"
                    class="img-fluid"
                    alt="Quang cao">
                <img
                    src="{{ url('public/home/images/banner-6.jpg') }}"
                    class="img-fluid"
                    alt="Quang cao">
            </div>
        </div>
        <!-- Category-slider-->
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="card border-0 p-2">
                    <img
                        src="{{ url('public/home/images/card-1.jpg') }}"
                        class="img-fluid"
                        alt="Quang cao"
                        style="width:200px; height:50px;">
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 p-2">
                    <img
                        src="{{ url('public/home/images/card-2.webp') }}"
                        class="img-fluid"
                        alt="Quang cao"
                        style="width:200px; height:50px;">
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 p-2">
                    <img
                        src="{{ url('public/home/images/card-4.png') }}"
                        class="img-fluid"
                        alt="Quang cao"
                        style="width:200px; height:50px;">
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 p-2">
                    <img
                        src="{{ url('public/home/images/card-3.jpg') }}"
                        class="img-fluid"
                        alt="Quang cao"
                        style="width:200px; height:50px;">
                </div>
            </div>
        </div>
        <!--Product-->

        <div class="card phone-new border-0">
            <div class="card-header font-weight-bolder">ĐIỆN THOẠI NỔI BẬT NHẤT</div>
            <div class="card-body p-1">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card-group">
                            <div class="card border-0 p-2" style="width:400px">
                                <img class="card-img-top" src="{{ url('public/home/images/phone-1.webp') }}" alt="Image">
                                <div class="card-body p-2 pb-0">
                                    <b class="card-title">Xiaomi Redmi Note 10 Pro 8GB</b>
                                    <p class="card-text"><b class="text-primary">6.500.000 ₫</b>
                                        <span class="line-through">7.500.000 ₫</span>
                                    </p>
                                    <a href="#" class="btn btn-primary btn-block">Mua ngay</a>
                                </div>
                            </div>
                            <div class="card border-0 p-2" style="width:400px">
                                <img class="card-img-top" src="{{ url('public/home/images/phone-2.webp') }}" alt="Image">
                                <div class="card-body p-2 pb-0">
                                    <b class="card-title">Xiaomi Redmi Note 10 Lite 8GB</b>
                                    <p class="card-text"><b class="text-primary">5.500.000 ₫</b>
                                        <span class="line-through">7.500.000 ₫</span>
                                    </p>
                                    <a href="#" class="btn btn-primary btn-block">Mua ngay</a>
                                </div>
                            </div>
                            <div class="card border-0 p-2" style="width:400px">
                                <img class="card-img-top" src="{{ url('public/home/images/phone-3.webp') }}" alt="Image">
                                <div class="card-body p-2 pb-0">
                                    <b class="card-title">Xiaomi Redmi Note 10 Lite 8GB</b>
                                    <p class="card-text"><b class="text-primary">6.500.000 ₫</b>
                                        <span class="line-through">7.500.000 ₫</span>
                                    </p>
                                    <a href="#" class="btn btn-primary btn-block">Mua ngay</a>
                                </div>
                            </div>
                            <div class="card border-0 p-2" style="width:400px">
                                <img class="card-img-top" src="{{ url('public/home/images/phone-4.jpg') }}" alt="Image">
                                <div class="card-body p-2 pb-0">
                                    <b class="card-title">Xiaomi Redmi Note 10 Pro 8GB</b>
                                    <p class="card-text"><b class="text-primary">6.500.000 ₫</b>
                                        <span class="line-through">7.500.000 ₫</span>
                                    </p>
                                    <a href="#" class="btn btn-primary btn-block">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Product-->

        <!--Category-->
        <div class="card category-all border-0 mt-4">
            <div class="card-header font-weight-bolder">DANH MỤC PHỤ KIỆN</div>
            <div class="card-body p-1 text-center">
                <div class="row">
                    <div class="col-4 col-lg-2" style="height:100px; margin-bottom:8px; margin-top:10px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-1.png') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;margin-top:10px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-2.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;margin-top:10px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-3.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;margin-top:10px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-4.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;margin-top:10px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-5.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;margin-top:10px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-6.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-7.png') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-8.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-9.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-10.jpeg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-11.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                    <div class="col-4 col-lg-2" style="height:100px;margin-bottom:8px;">
                        <a href=""><img class="image-icon-category" src="{{ url('public/home/icon/icon-12.jpg') }}" alt="Image" style="width:100px; height: 100px; margin-top:0px;border-radius:10px;"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
