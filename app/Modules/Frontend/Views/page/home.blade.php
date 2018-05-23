@extends('Frontend::layouts.default')

@section('content')
    @include('Frontend::layouts.banner')
    <!--Start services area-->
    <section class="services-area">
        <div class="container">
            <div class="sec-title">
                <h1>Chúng tôi cung cấp các dịch vụ</h1>
            </div>
            @if(!$services->isEmpty())
                @foreach($services->chunk(3) as $item_chunk)
                    <div class="row">
                    @foreach($item_chunk as $item_service)
                        <!--Start single service item-->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-service-item">
                                    <div class="img-holder">
                                        <img src="{{asset('public/uploads/'.$item_service->img_url)}}" alt="{!! $item_service->title !!}">
                                        {{-- <div class="overlay">
                                            <div class="box">
                                                <div class="content">
                                                    <a class="thm-btn yellow-bg" href="chemical-research.html">Read More</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="text-holder">
                                        {{-- <div class="icon">
                                            <span class="flaticon-science"></span>
                                        </div> --}}
                                        <div class="text">
                                            <h3>{!! $item_service->title !!}</h3>
                                            {{-- <p>Chemical Research expertise in for you manipulating chemicals energy.</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single service item-->
                        @endforeach
                    </div>
                @endforeach
        </div>
        @endif
    </section>
    <!--End services area-->

    <!--Start latest project area-->
    <section class="latest-project-area" style="background-image:url({{asset('public/assets/Frontend')}}/images/banner/banner02.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title pull-left">
                        <h1>Các dự án</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Start single latest project-->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-latest-project">
                        <div class="img-holder">
                            <img src="{{asset('public/assets/Frontend')}}/images/project/project01.jpg" alt="Sân Tennis">
                            {{-- <div class="overlay-box">
                                <div class="box">
                                    <div class="content">
                                        <a href="project-single.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="title-holder text-center">
                            <h4>Sân Tennis</h4>
                        </div>
                    </div>
                </div>
                <!--End single latest project-->
                <!--Start single latest project-->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-latest-project">
                        <div class="img-holder">
                            <img src="{{asset('public/assets/Frontend')}}/images/project/project02.jpg" alt="Nhà dân dụng">
                        </div>
                        <div class="title-holder text-center">
                            <h4>Nhà Ở Hiện Đại</h4>
                        </div>
                    </div>
                </div>
                <!--End single latest project-->
                <!--Start single latest project-->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-latest-project">
                        <div class="img-holder">
                            <img src="{{asset('public/assets/Frontend')}}/images/project/project03.jpg" alt="Trung tâm thương mại">
                        </div>
                        <div class="title-holder text-center">
                            <h4>Trung tâm thương mại</h4>
                        </div>
                    </div>
                </div>
                <!--End single latest project-->
                <!--Start single latest project-->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-latest-project">
                        <div class="img-holder">
                            <img src="{{asset('public/assets/Frontend')}}/images/project/project04.jpg" alt="Tòa Án">
                        </div>
                        <div class="title-holder text-center">
                            <h4>Tòa Án</h4>
                        </div>
                    </div>
                </div>
                <!--End single latest project-->
            </div>
        </div>
    </section>
    <!--End latest project area-->

    <!--Start our team area-->
    <section class="our-team-area">
        <div class="container">
            <div class="sec-title">
                <h1>Sản phẩm nổi bật của chúng tôi</h1>
            </div>
            @if(!$categories->isEmpty())
                @foreach($categories->chunk(2) as $item_cate_chunk)
            <div class="row">
                @foreach($item_cate_chunk as $item_cate)
                <!--Start single team member-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="single-team-member clearfix">
                            <div class="img-holder">
                                <img src="{{asset('public/uploads/'.$item_cate->img_url)}}" alt="{!! $item_cate->name !!}">
                            </div>
                            <div class="text-holder">
                                <h3>{!! $item_cate->name !!}</h3>
                                {!! $item_cate->description !!}
                            </div>
                        </div>
                    </div>
                    <!--End single team member-->
                @endforeach


            </div>
                @endforeach
            @endif
        </div>
    </section>
    <!--End our team area-->



    <!--Start google map area-->
    <section class="google-map-area">
        <div
                class="google-map"
                id="home-google-map"
                data-map-lat="10.7905892"
                data-map-lng="106.7192185"
                data-icon-path="{{asset('public/assets/Frontend')}}/images/marker-logo.png"
                data-map-title="92 Nguyễn Hữu Cảnh Phường 22, Quận Bình Thạnh TP.Hồ Chí Minh"
                data-map-zoom="18"
                data-markers='{
                  "marker-1": [10.7905892, 106.7192185, "<h4>Công ty An Sơn</h4><p>92 Nguyễn Hữu Cảnh Phường 22, Quận Bình Thạnh</p>"]
              }'>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8">
                    <div class="send-message">
                        <div class="sec-title">
                            <h1>Liên Hệ Với Chúng Tôi</h1></h1>
                        </div>
                        <form action="{{route('f.postLienhe')}}" method="POST" class="contact-form">
                            {{Form::token()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-field">
                                                <input type="text" name="name" placeholder="Tên khách hàng*">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-field">
                                                <input type="text" name="email" placeholder="Email*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <input type="text" name="phone" placeholder="Số điện thoại*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" placeholder="Nội dung..."></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="thm-btn yellow-bg" type="submit">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End google map area-->

@stop
