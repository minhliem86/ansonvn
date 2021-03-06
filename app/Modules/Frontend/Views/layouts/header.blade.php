<!--Start header area-->
<header class="header-area">
    <div class="container">
        <div class="logo pull-left">
            <a href="{{route('homepage')}}">
                <img src="{{asset('public/assets/Frontend')}}/images/logo.png" class="img-responsive" alt="An Son">
            </a>
        </div>
        <div class="top-info pull-right">
            <ul>
                <li class="single-info-box">
                    <div class="icon-holder">
                        <span class="flaticon-earth-grid"></span>
                    </div>
                    <div class="text-holder">
                        <p><span>Địa chỉ:</span> 92 Nguyễn Hữu Cảnh<br>Phường 22, Quận Bình Thạnh TP.Hồ Chí Minh</p>
                    </div>
                </li>
                <li class="single-info-box">
                    <div class="icon-holder">
                        <span class="flaticon-email-envelope-back-symbol-on-phone-screen"></span>
                    </div>
                    <div class="text-holder">
                        <p><span>Liên lạc:</span> (84.8) 225 344 77 - (84.8) 225 344 88  <br>bds@ansonvn.com</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<!--End header area-->

<!--Start mainmenu area-->
<section class="mainmeu-area stricky">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="mainmenu-bg clearfix">
                    <nav class="main-menu pull-left">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation">
                                <li class="{{LP_lib::setActive(1,'','current')}}"><a href="{{route('homepage')}}">Trang chủ</a></li>
                                <li class="{{LP_lib::setActive(1,'gioi-thieu','current')}}"><a href="{{route('f.getGioithieu')}}">Giới thiệu</a></li>
                                <li class="dropdown"><a href="{{route('homepage')}}">Sản phẩm</a>
                                    @if(!$cate_menu->isEmpty())
                                    <ul>
                                        @foreach($cate_menu as $item_cate)
                                        <li><a href="{{route('homepage')}}">{!! $item_cate->name !!}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                <li class="dropdown"><a href="{{route('homepage')}}">Dịch Vụ</a>
                                    @if(!$services->isEmpty())
                                        <ul>
                                            @foreach($services as $item_service)
                                                <li><a href="{{route('homepage')}}">{!! $item_service->name !!}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <ul>
                                        <li><a href="{{route('homepage')}}">Thi Công Tòa Nhà Văn Phòng</a></li>
                                        <li><a href="{{route('homepage')}}">Thi Công Công Trình Thể Thao</a></li>
                                        <li><a href="{{route('homepage')}}">Thi Công Nhà Dân Dụng</a></li>
                                        <li><a href="{{route('homepage')}}">Tư Vấn Thiết Kế</a></li>
                                        <li><a href="{{route('homepage')}}">Cơ Khí Chế Tạo Máy</a></li>
                                    </ul>
                                </li>
                                <li class="{{LP_lib::setActive(1,'thu-vien-hinh-anh','current')}}"><a href="{{route('f.getGallery')}}">Hình Ảnh</a></li>
                                <li class=" dropdown"><a href="">Chi Nhánh</a>
                                    @if(!$branch->isEmpty())
                                        <ul>
                                            @foreach($branch as $item_branch)
                                                <li><a href="{{route('f.getChinhanh', $item_branch->id)}}">{!! $item_branch->title !!}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                <li class="{{LP_lib::setActive(1,'lien-he','current')}}"><a href="{{route('f.getLienhe')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End mainmenu area-->
