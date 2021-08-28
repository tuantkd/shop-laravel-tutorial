@extends("layout.layout_home")

@section('title', 'Chi tiết sản phẩm')
    @section('content')
        <style>
            .primary,
            .thumbnails {
            display: table-cell;
            }

            .thumbnails {
            width: 100px;
            }

            .primary {
            width: 600px;
            height: 400px;
            border-radius: 5px;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            border: 1px solid #eeeeee;
            }

            .thumbnail:hover .thumbnail-image, .selected .thumbnail-image {
            border: 1px solid #1a202c;
            }

            .thumbnail-image {
            width: 80px;
            height: 80px;
            margin-bottom: 5px;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            border: 2px solid gray;
            border-radius: 5px;
            }

            .text-color-price #price-origination {
                text-decoration: line-through;
                color: #718096;
                font-weight: bold;
            }

            .text-color-price p {
                font-size: 13px;
            }


            .form-group {
            display: block;
            margin-bottom: 15px;
            }

            .form-group input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
            }

            .form-group label {
            position: relative;
            cursor: pointer;
            }

            .form-group label:before {
            content: "";
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid #0079bf;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
                inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-right: 5px;
            border-radius: 5px;
            }

            .form-group input:checked + label:after {
            content: "";
            display: inline-block;
            position: absolute;
            top: 5px;
            left: 9px;
            width: 6px;
            height: 14px;
            border: solid #0079bf;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            }

            .p-0 .btn-decrease{
                background-color: #00aced;
                width: 30px;
                height: 30px;
                border-radius: 5px;
                border:1px solid #eeeeee;
                font-weight: bolder;
            }
            .p-0 .btn-increase{
                background-color: #00aced;
                width: 30px;
                height: 30px;
                border-radius: 5px;
                border:1px solid #eeeeee;
                font-weight: bolder;
            }
            .p-0 .text-quality{
                width: 80px;
                outline: none;
                height:35px;
                border:1px solid #eeeeee;
                border-radius: 5px;
                text-align:center;
            }

            .product-together b{
                font-size: 20px;
            }

            .rating-star .card-body .row .col-12 .star-big{
                font-size: 50px;
                color: orange;
            }

            .rating-star .card-body .row .col-12 .star-big span{
                font-size: 50px;
                color: orange;
            }

            .rating-star .card-body .row .btn-submit-star{
                padding: 66px 92px;
            }

            .rating-star .card-body .row .btn-submit-star #btn-star-sub{
                width:200px;
            }

            .rating-star .card-body .row .avg-process-star{
                border-left: 1px solid #dddddd;
                border-right: 1px solid #dddddd;
                padding: 0px 25px;
            }


            .checked {
            color: orange;
            }

            /* Three column layout */
            .side {
            float: left;
            width: 15%;
            margin-top:10px;
            }

            .middle {
            margin-top:10px;
            float: left;
            width: 70%;
            }

            /* Place text to the right */
            .right {
            text-align: right;
            }

            /* The bar container */
            .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
            }

            /* Individual bars */
            .bar-5 {width: 60%; margin-top: 5px; height: 15px; background-color: #04AA6D;}
            .bar-4 {width: 30%; margin-top: 5px; height: 15px; background-color: #2196F3;}
            .bar-3 {width: 10%; margin-top: 5px; height: 15px; background-color: #00bcd4;}
            .bar-2 {width: 4%; margin-top: 5px; height: 15px; background-color: #ff9800;}
            .bar-1 {width: 15%; margin-top: 5px; height: 15px; background-color: #f44336;}

            /* Responsive layout - make the columns stack on top of each other instead of next to each other */
            @media (max-width: 400px) {
            .side, .middle {
                width: 100%;
            }
            .right {
                display: none;
            }
            }

            #full-stars-example-two .rating-group {
            display: inline-flex;
            }
            #full-stars-example-two {
            margin-top: 20px;
            text-align: center;
            display: none;
            }
            #full-stars-example-two .rating__icon {
            pointer-events: none;
            }
            #full-stars-example-two .rating__input {
            position: absolute !important;
            left: -9999px !important;
            }
            #full-stars-example-two .rating__input--none {
            display: none;
            }
            #full-stars-example-two .rating__label {
            cursor: pointer;
            font-size: 25px;
            padding: 5px;
            }
            #full-stars-example-two .rating__icon--star {
            color: orange;
            }
            #full-stars-example-two .rating__input:checked ~ .rating__label .rating__icon--star {
            color: #ddd;
            }
            #full-stars-example-two .rating-group:hover .rating__label .rating__icon--star {
            color: orange;
            }
            #full-stars-example-two .rating__input:hover ~ .rating__label .rating__icon--star {
            color: #ddd;
            }
        </style>


        <div class="container" style="margin-top:80px;">
            <ul class="breadcrumb pt-1 pb-1">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Điện thoại</a></li>
                <li class="breadcrumb-item"><a href="#">Xiaomi</a></li>
                <li class="breadcrumb-item active">Xiaomi Redmi Note 10 Pro 8GB</li>
            </ul>
            <h4 class="font-weight-bolder mb-4">Xiaomi Redmi Note 10 Pro 8GB</h4>
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="image-gallery">
                        <aside class="thumbnails">
                        <a href="#" class="selected thumbnail" data-big="{{ url('public/home/images/phone-2.webp') }}">
                            <div class="thumbnail-image" style="background-image: url(public/home/images/phone-2.webp)"></div>
                        </a>
                        <a href="#" class="thumbnail" data-big="{{ url('public/home/images/phone-3.webp') }}">
                            <div class="thumbnail-image" style="background-image: url(public/home/images/phone-3.webp)"></div>
                        </a>
                        <a href="#" class="thumbnail" data-big="{{ url('public/home/images/phone-4.jpg') }}">
                            <div class="thumbnail-image" style="background-image: url(public/home/images/phone-4.jpg)"></div>
                        </a>
                        </aside>

                        <main class="primary" style="background-image: url('public/home/images/phone-2.webp');"></main>
                    </div>
                    <!--<img src="{{ url('public/home/images/phone-1.webp') }}" class="img-fluid product-image" alt="Image">-->
                </div>

                <div class="col-12 col-lg-3 p-0 text-color-price">
                    <h4 class="font-weight-bolder text-primary">6.650.000 ₫</h4>
                    <span id="price-origination">Giá niêm yết: 7.490.000 ₫</span>
                    <p>Chọn màu xem giá và chi nhánh cửa hàng</p>
                        <form>
                            <div class="form-group">
                            <input type="checkbox" id="html">
                            <label for="html">Màu trắng</label>
                            </div>
                            <div class="form-group">
                            <input type="checkbox" id="css">
                            <label for="css">Màu đen</label>
                            </div>
                            <div class="form-group">
                            <input type="checkbox" id="javascript">
                            <label for="javascript">Màu đỏ</label>
                            </div>
                        </form>

                        <div class="p-0 mb-3">
                            <button data-decrease class="btn-decrease">-</button>
                            <input data-value type="text" value="1" class="text-quality"/>
                            <button data-increase class="btn-increase">+</button>
                        </div>

                        <a href="#" class="btn btn-danger font-weight-bolder" role="button">MUA NGAY</a>
                        <a href="#" class="btn btn-primary font-weight-bolder" role="button">THÊM GIỎ HÀNG</a>
                </div>

                <div class="col-12 col-lg-4">
                    <h6 class="font-weight-bolder">Tình trạng</h6>
                    Mới, đầy đủ phụ kiện từ nhà sản xuất
                    <h6 class="font-weight-bolder">Hộp bao gồm</h6>
                    Máy, Sách hướng dẫn, Cây lấy sim, Ốp lưng, Cáp Type C, Củ sạc nhanh rời đầu Type A
                    <h6 class="font-weight-bolder">Bảo hành</h6>
                    Bảo hành 18 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. Gia hạn bảo hành thời gian giãn cách(Chi tiết)
                </div>


            </div>



            <hr/>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <p style="text-align:justify;">
                    Điện thoại Xiaomi Redmi Note 10 Pro - Thế hệ mới hiện đại
                    Xiaomi là hãng sản xuất điện thoại nổi tiếng được nhiều người dùng ưu tiên và lựa chọn sử dụng. Redmi Note 10 Pro là chiếc điện thoại hiện đại được mới được hãng ra mắt với nhiều tính năng và công nghệ hiện đại mang đến sự tiện lợi khi người dùng sử dụng chiếc smartphone này.
                    Thiết kế tinh tế và sang trọng, màn hình Full HD 6.67 inch
                    Xiaomi Redmi Note 10 phiên bản Pro được hãng thiết kế với kích thước vừa vặn với tay người dùng. Hơn thế với thiết kế của thế hệ tinh tế và đầy sang trọng này giúp thu hút mọi ánh nhìn bời cái nhìn đầu tiên.
                    Mặt lưng của máy được thiết kế vuốt cong ở hai cạnh tạo được cảm giác mỏng và chắc chắn khi cầm nắm. Góc phải mặt lưng được in tên của nhà sản xuất Xiaomi vừa tạo được điểm nhấn cho sản phẩm vừa đặt ở vị trí người dùng có thể thoải mái trang trí chiếc điện thoại một cách dễ dàng và tiện lợi.
                    Thiết kế tinh tế và sang trọng, màn hình Full HD 6.7 inch
                    Trang bị màn hình tràn viền cong cạnh 3D 6.67 inch giúp người dùng có thể thoải mái khi sử dụng, bên cạnh đó cũng làm nổi lên sự sang trọng và cao cấp của Xiaomi Redmi Note 10 Pro.
                    Sự trang bị màn hình Arc AMOLED với độ lớn 6.67 inch với độ phân giải Full HD thêm vào đó là giấy chứng nhận TUV giúp giảm ánh sáng xanh tác động xấu đến thị lực của người dùng.
                    Nhiều màu sắc lựa chọn
                    Bộ vi xử lý Snapdragon 732G, Ram 8GB, bộ nhớ trong 128GB
                    Tuy không phải là một chiếc điện thoại chuyên chơi game nhưng Xiaomi Redmi Note 10 Pro vẫn được sở hữu bộ vi xử lý Snapdragon 732G mang đến tốc độ xử lý tất cả các dữ liệu nhanh chóng.
                    Hơn thế, với con chip Snapdragon 732G có thể quay video với độ phân giải 8K, hỗ trợ trí tuệ nhân tạo và khả năng xử lý hình ảnh tốt hơn và đem tới cho người dùng trải nghiệm chơi game tốt hơn.
                    Bộ vi xử lý Snapdragon 765G, Ram 6GB, bộ nhớ trong 64GB
                    Hơn thế, với bộ nhớ Ram 8GB giúp đọc và ghi các dữ liệu nhanh chóng, hỗ trợ người dùng có thể đa nhiệm trên nhiều tác vụ cùng lúc mà không lo bị giật lag hơn thế còn mang lại sự mượt mà khi thực hiện các thao tác.
                    Bộ nhớ trong 128GB đủ để bạn có thể lưu trữ những ứng dụng căn bản. Ngoài ra bạn cũng có thể trang bị thêm bỏ nhớ mở rộng lên đến 512GB. Cho phép bạn lưu trữ tất cả các dữ liệu được thoải mái và nhanh chóng.
                    Bộ 4 camera lên đến 108 MP, camera trước 16MP
                    Xu hướng 4 camera cũng được Xiaomi cập nhật và thiết kế lên chiếc Xiaomi Redmi Note 10 Pro. Bộ 4 camera của điện thoại có độ phân giải lần lượt là 108 MP, 8 MP, 5 MP, 2 MP.
                    Với 4 chiếc camera này người dùng có thể thoải mái chụp hình để lưu lại những khoảnh đẹp bên gia đình và bạn bè với các chế độ chụp chụp liên tục, chụp HDR tạo được nhiều khung hình đẹp và đầy tự nhiên.
                    Bộ 4 camera lên đến 64 MP, camera trước 32MP
                    Với những bạn thích selfie chắc hẳn đây là chiếc điện thoại đáng để bạn quan tâm. Xiaomi Redmi Note 10 Pro sở hữu camera trước hình giọt nước có độ phân giải lên đến 16MP giúp bạn có selfie với những bức ảnh đẹp.
                    Camera trước 16MP
                    Ngoài ra, camera trước còn hỗ trợ người dùng thực hiện các cuộc gọi video với người thân hay một cách dễ dàng mà không cần dùng đến các thiết bị hỗ trợ kết nối gây nhiều khó khăn khác.
                    Dung lượng pin 5020mAh, tích hợp vào công nghệ sạc nhanh và trang bị 2 sim tiện lợi
                    Xiaomi Redmi Note 10 Pro được hãng trang bị dung lượng pin 5020mAh giúp người dùng có thể trải nghiệm trên chiếc điện thoại thời gian dài mà không lo bị nhanh hết pin, gián đoạn quá trình sử dụng.
                    Tuy dung lượng pin cao nhưng máy được tích hợp công nghệ sạc nhanh giúp người dùng rút ngắn được thời gian chờ đợi, sớm hoạt động trở lại một cách bình thường.
                    Dung lượng pin 5100mAh, tích hợp vào công nghệ sạc nhanh và trang bị 2 sim tiện lợi
                    Trên thị trường hiện nay có rất nhiều nhà mạng, tùy vào nhu cầu mà mỗi người sẽ lựa chọn sim của nhà mạng sử dụng cho phù hợp. Vì thế, đòi hỏi điện thoại của bạn phải được trang bị nhiều sim để có thể đáp ứng nhiều nhu cầu liên lạc nội mạng làm giảm bớt chi phí.
                    Việc trang bị 2 sim mang đến sự tiện lợi khi bạn sử dụng Redmi Note 10 Pro. Giúp người dùng có thể mở rộng khả năng liên lạc và hơn thế làm giảm được nhiều chi phí khi liên lạc và tiện lợi hơn khi sử dụng.
                    Mua điện thoại Redmi Note 10 Pro chính hãng, trả góp 0% tại CellphoneS
                    Bạn đang tìm kiếm cho mình một chiếc điện thoại để có đáp ứng được nhu cầu sử dụng như hỗ trợ trong công việc hay học tập và giải trí. Redmi Note 10 Pro là sự lựa chọn không thể bỏ qua.
                    Hiện tại, điện thoại Xiaomi Redmi Note 10 Pro đang được phân phối chính hãng bởi CellphoneS. Vì thế hãy đến hệ thống chi nhánh gần bạn của CellphoneS tại Hà Nội và thành phố Hồ Chí Minh để sở hữu ngay hàng chính hãng với mức giá rẻ.
                    Ngoài ra, nếu bạn có nhu cầu trả góp CellphoneS sẽ hỗ trợ trả góp với mức lãi suất 0% giúp người dùng yên tâm hơn khi mua sản phẩm ở CellphoneS.
                    </p>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <b>Thông số kỹ thuật</b>
                        </div>
                        <div class="card-body p-2">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width:40%;">Kích thước màn hình</td>
                                        <td style="width:40%; font-weight: bold;">6.67 inches</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%;">Kích thước màn hình</td>
                                        <td style="width:40%; font-weight: bold;">6.67 inches</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%;">Kích thước màn hình</td>
                                        <td style="width:40%; font-weight: bold;">6.67 inches</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%;">Kích thước màn hình</td>
                                        <td style="width:40%; font-weight: bold;">6.67 inches</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%;">Kích thước màn hình</td>
                                        <td style="width:40%; font-weight: bold;">6.67 inches</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>




            <div class="card border-0">
                <div class="card-header product-together border-0"><b>Các sản phẩm tương tự</b></div>
                <div class="card-body p-2 border-0">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="card p-0 border-0">
                            <img class="card-img-top" src="{{ url('public/home/images/phone-2.webp') }}" alt="Card" style="width:100%; height: 250px;">
                            <div class="card-body p-2 pb-0">
                                <b class="card-title">Xiaomi Redmi Note 10 Pro 8GB</b>
                                <p class="card-text"><b class="text-primary">6.500.000 ₫</b>
                                <span class="line-through">7.500.000 ₫</span>
                                </p>
                                <a href="#" class="btn btn-primary btn-block">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="card p-0 border-0">
                            <img class="card-img-top" src="{{ url('public/home/images/phone-4.jpg') }}" alt="Card" style="width:100%; height: 250px;">
                            <div class="card-body p-2 pb-0">
                                <b class="card-title">Xiaomi Redmi Note 10 Pro 8GB</b>
                                <p class="card-text"><b class="text-primary">6.500.000 ₫</b>
                                <span class="line-through">7.500.000 ₫</span>
                                </p>
                                <a href="#" class="btn btn-primary btn-block">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="card p-0 border-0">
                            <img class="card-img-top" src="{{ url('public/home/images/phone-1.webp') }}" alt="Card" style="width:100%; height: 250px;">
                            <div class="card-body p-2 pb-0">
                                <b class="card-title">Xiaomi Redmi Note 10 Pro 8GB</b>
                                <p class="card-text"><b class="text-primary">6.500.000 ₫</b>
                                <span class="line-through">7.500.000 ₫</span>
                                </p>
                                <a href="#" class="btn btn-primary btn-block">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="card p-0 border-0">
                            <img class="card-img-top" src="{{ url('public/home/images/phone-1.webp') }}" alt="Card" style="width:100%; height: 250px;">
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



            </hr>

            <h4><b>28 Đánh giá Xiaomi Redmi Note 10 Pro 8GB</b></h4>
            <div class="card rating-star">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4 text-center pt-3">
                            <h3 class="text-weight-bolder"><b>SAO TRUNG BÌNH</b></h3>
                            <div class="star-big">
                                5<span class="fa fa-star checked"></span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 avg-process-star">
                            <div class="row">
                                <div class="side">
                                    <div>5 <span class="fa fa-star checked" style="color:orange;font-size:15px;"></span></div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                    <div class="bar-5"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>150</div>
                                </div>
                                <div class="side">
                                    <div>4 <span class="fa fa-star checked" style="color:orange;font-size:15px;"></span></div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                    <div class="bar-4"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>63</div>
                                </div>
                                <div class="side">
                                    <div>3 <span class="fa fa-star checked" style="color:orange;font-size:15px;"></span></div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                    <div class="bar-3"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>15</div>
                                </div>
                                <div class="side">
                                    <div>2 <span class="fa fa-star checked" style="color:orange;font-size:15px;"></span></div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                    <div class="bar-2"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>6</div>
                                </div>
                                <div class="side">
                                    <div>1 <span class="fa fa-star checked" style="color:orange;font-size:15px;"></span></div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                    <div class="bar-1"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>20</div>
                                </div>
                                </div>







                                <div id="full-stars-example-two">
                                    Vui lòng chọn đánh giá:
                                    <div class="rating-group">
                                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                                    </div>
                                </div>

                            </div>

                        <div class="col-12 col-lg-4 btn-submit-star">
                            <button type="button" class="btn btn-primary" id="btn-star-sub" onclick="HideShow()">
                                Gửi đánh giá của bạn
                            </button>
                        </div>


                    </div>
                </div>
            </div>




        </div>


        <script>
            function HideShow() {
                let star_current = document.getElementById('full-stars-example-two').style.display;
                if (star_current === "none") {
                    document.getElementById('full-stars-example-two').style.display = "block";
                    document.getElementById('btn-star-sub').innerHTML = 'Đóng';
                }else{
                    document.getElementById('full-stars-example-two').style.display = "none";
                    document.getElementById('btn-star-sub').innerHTML = 'Gửi đánh giá của bạn';
                }
            }
        </script>




        <script>
            $(".thumbnail").on("click", function () {
            var clicked = $(this);
            var newSelection = clicked.data("big");
            var $img = $(".primary").css("background-image", "url(" + newSelection + ")");
            clicked.parent().find(".thumbnail").removeClass("selected");
            clicked.addClass("selected");
            $(".primary").empty().append($img.hide().fadeIn("slow"));
            });

            $(function () {
                $("[data-decrease]").click(decrease);
                $("[data-increase]").click(increase);
                $("[data-value]").change(valueChange);
            });

            function decrease() {
                var value = $(this).parent().find("[data-value]").val();
                if (value > 1) {
                    value--;
                    $(this).parent().find("[data-value]").val(value);
                }
            }

            function increase() {
                var value = $(this).parent().find("[data-value]").val();
                if (value < 100) {
                    value++;
                    $(this).parent().find("[data-value]").val(value);
                }
            }

            function valueChange() {
                var value = $(this).val();
                if (value == undefined || isNaN(value) == true || value <= 0) {
                    $(this).val(1);
                } else if (value >= 101) {
                    $(this).val(100);
                }
            }



        </script>
@endsection
