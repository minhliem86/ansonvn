@extends('Frontend::layouts.default')

@section('css')
    <link rel="stylesheet" href="{{asset('public/assets/Frontend')}}/css/customize.css">
    <link rel="stylesheet" href="{!! asset('public/assets/Frontend') !!}/css/plugins/img-hover/css/imagehover.css">
@stop

@section('content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area" style="background-image: url({{asset('public/assets/Frontend')}}/images/banner/banner03.jpg);">
        <div class="container text-center">
            <h1>Thư Viện Hình Ảnh</h1>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start welcome Industry area-->
    <section class="welcome-industry-area">
        <div class="container">
            @if(!$gallery->isEmpty())
            <div class="row">
                @foreach($gallery as $item)
                <div class="col-md-4">
                    <div class="each-gallery">
                        <figure class="imghvr-shutter-out-diag-2" data-id="{!! $item->id !!}">
                            <img src="{!! asset($item->photos()->inRandomOrder()->first()->thumb_url) !!}" class="img-responsive" alt="">
                            <figcaption>
                                <h3 class="ih-fade-down ih-delay-sm">{!! $item->title !!}</h3>
                            </figcaption>
                        </figure>

                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <!--End welcome Industry area-->

    <!--Start choosing area-->
    <section class="choosing-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="content">
                        <div class="sec-title">
                            <!--<p>25 Years of Experince</p> -->
                            <h1>Tại sao chọn chúng tôi</h1>
                        </div>
                        <ul>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-avatar"></span>
                                </div>
                                <div class="text-holder">
                                    <h3>Chúng tôi chuyên nghiệp</h3>
                                    <p>&nbsp;</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-interface-2"></span>
                                </div>
                                <div class="text-holder">
                                    <h3>Chúng tôi có trách nhiệm</h3>
                                    <p>&nbsp;</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-tool-1"></span>
                                </div>
                                <div class="text-holder">
                                    <h3>Chúng tôi uy tín</h3>
                                    <p>&nbsp;</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img-box">
                        <img src="{{asset('public/assets/Frontend')}}/images/about/about02.jpg" alt="An Sơn">
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{route('f.postLienhe')}}" method="POST" class="contact-form">

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
    </section>
    <!--End choosing area-->
@stop

@section('script')
    <link rel="stylesheet" href="{!! asset('public/assets/Frontend') !!}/js/lightbox/css/lightgallery.css">
    <script src="{!! asset('public/assets/Frontend') !!}/js/lightbox/js/lightgallery.js"></script>

    <script>
        $(document).ready(function(){
            $('.each-gallery figure').on('click', function(){
                var id = $(this).data('id');
                $.ajax({
                    url: "{!! route('f.postAjaxGallery') !!}",
                    type: 'POST',
                    data: {id : id, _token: $('meta[name="csrf-token"]').attr('content')},
                    success: function (res) {
                        $(this).lightGallery({
                            dynamic: true,
                            dynamicEl: res.data
                        })


                    }
                })
            })
        })
    </script>
@stop
