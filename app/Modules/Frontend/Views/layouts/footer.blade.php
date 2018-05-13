<!--Start footer area-->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="single-footer-widget pd-bottom">
                    <div class="footer-logo">
                        <a href="{{route('homepage')}}">
                            <img src="{{asset('public/assets/Frontend')}}/images/logo-footer.png" class="img-responsive" alt="Awesome Footer Logo">
                        </a>
                    </div>
                    <div class="industry-info">
                        <p>Công Ty Cổ Phần Đầu Tư - Thương Mại An Sơn được thành lập trong thời kỳ đất nước đang trên đà phát triển và đáp ứng nhu cầu xây dựng là một trong những nhiệm vụ cấp thiết của Chính phủ nói chung và Thành phố Hồ Chí Minh nói riêng. </p>
                    </div>
                    {{-- <ul class="footer-social-links">
                        <li><a href="#"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i aria-hidden="true" class="fa fa-linkedin"></i></a></li>
                    </ul> --}}
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="single-footer-widget pd-bottom">
                    <div class="title">
                        <h3>Liên kết nhanh</h3>
                    </div>
                    <ul class="quick-links left">
                        <li><a href="{{route('homepage')}}">Trang chủ</a></li>
                        <li><a href="{{route('f.getGioithieu')}}">Giới thiệu</a></li>
                        <li><a href="{{route('f.getLienhe')}}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <!--End single footer widget-->

            <!--Start single footer widget-->
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="single-footer-widget">
                    <div class="title">
                        <h3>Liên hệ</h3>
                    </div>
                    <ul class="contact-address">
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-earth-grid"></span>
                            </div>
                            <div class="content-holder">
                                <p><span>Địa chỉ:</span> 92 Nguyễn Hữu Cảnh Phường 22, Quận Bình Thạnh TP.Hồ Chí Minh</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-email-envelope-back-symbol-on-phone-screen"></span>
                            </div>
                            <div class="content-holder">
                                <p><span>Điện thoại:</span> (84.8) 225 344 77<br/>(84.8) 225 344 88 </p>
                            </div>
                        </li>
                        {{-- <li>
                            <div class="icon-holder">
                                <span class="flaticon-technology-1"></span>
                            </div>
                            <div class="content-holder">
                                <p><span>HotLine:</span> (84.0) 976 509 797</p>
                            </div>
                        </li> --}}
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-clock"></span>
                            </div>
                            <div class="content-holder">
                                <p><span>Thứ Hai - Thứ Sáu :</span> 08.00 - 17.00</p>
                                <p><span>Thứ Bảy :</span> 08.00 - 12.00</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--End single footer widget-->
        </div>
    </div>
</footer>
<!--End footer area-->

<!--Start footer bottom area-->
<section class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <div class="copyright-text">
                    <p>Copyright © 2017 <a href="">An Sơn</a></p>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <ul class="footer-menu">
                    <li><a href="{{route('homepage')}}">Trang chủ</a></li>
                    <li><a href="{{route('f.getGioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('f.getLienhe')}}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End footer bottom area-->
