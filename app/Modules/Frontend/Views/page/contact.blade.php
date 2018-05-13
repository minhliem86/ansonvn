@extends('Frontend::layouts.default')

@section('script')

  @if(\Session::has('success-email'))
    <script src="{{asset('public/assets/Frontend')}}/js/noty/jquery.noty.js"></script>
    <script src="{{asset('public/assets/Frontend')}}/js/noty/layouts/top.js"></script>
    <script src="{{asset('public/assets/Frontend')}}/js/noty/themes/default.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        var n = noty({
            text: 'Thông tin của bạn đã được gửi đến bộ phận Chăm Sóc Khách Hàng. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất',
            type: 'success',
            timeout:3000,
            layout: 'top',
            theme: 'defaultTheme',
            animation: {
                open: {height: 'toggle'},
                close: {height: 'toggle'},
                easing: 'swing',
                speed: 500 // opening & closing animation speed
            }
        });


      })
    </script>
  @endif
@endsection


@section('content')
  <!--Start breadcrumb area-->
  <section class="breadcrumb-area" style="background-image: url({{asset('public/assets/Frontend')}}/images/banner/banner04.jpg);">
  	<div class="container text-center">
  		<h1>LIÊN HỆ VỚI CHÚNG TÔI</h1>
  	</div>
  </section>
  <!--End breadcrumb area-->

  <!--Start Contact area-->
  <section class="contact-area">
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-sm-7 col-xs-12">
                  <div class="contact-details">
                      <h2>Thông tin</h2>
                      <div class="contact-info-carousel owl-theme owl-carousel">
                          <div class="item">
                              <div class="contact-details-title">
                                  <h5>Văn phòng chính</h5>
                              </div>
                              <ul class="contact-info">
                                  <li>
                                      <div class="icon-box">
                                          <span class="flaticon-signs"></span>
                                      </div>
                                      <div class="text-box">
                                          <p><span>Địa chỉ:</span> 92 Nguyễn Hữu Cảnh<br>Phường 22, Quận Bình Thạnh TP.Hồ Chí Minh</p>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="icon-box">
                                          <span class="flaticon-email-envelope-back-symbol-on-phone-screen"></span>
                                      </div>
                                      <div class="text-box">
                                          <p><span>Liên lạc:</span> (84.8) 225 344 77 - (84.8) 225 344 88  <br>bds@ansonvn.com</p>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="icon-box">
                                          <span class="flaticon-clock-1"></span>
                                      </div>
                                      <div class="text-box">
                                        <p><span>Thứ Hai - Thứ Sáu :</span> 08.00 - 17.00</p>
                                        <p><span>Thứ Bảy :</span> 08.00 - 12.00</p>
                                      </div>
                                  </li>

                              </ul>
                          </div>
                          <div class="item">
                              <div class="contact-details-title">
                                  <h5>OBIDO Cần Thơ</h5>
                              </div>
                              <ul class="contact-info">
                                  <li>
                                      <div class="icon-box">
                                          <span class="flaticon-signs"></span>
                                      </div>
                                      <div class="text-box">
                                          <p><span>Địa chỉ:</span> G8-66 Bùi Quang Trinh<br>Phú Thứ, Cái Răng, Cần Thơ</p>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="icon-box">
                                          <span class="flaticon-email-envelope-back-symbol-on-phone-screen"></span>
                                      </div>
                                      <div class="text-box">
                                          <p><span>Liên lạc:</span> (0292) 6507 788  <br>bds@ansonvn.com</p>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="icon-box">
                                          <span class="flaticon-clock-1"></span>
                                      </div>
                                      <div class="text-box">
                                          <p><span>Thứ Hai - Thứ Sáu :</span> 08.00 - 17.00</p>
                                          <p><span>Thứ Bảy :</span> 08.00 - 12.00</p>
                                      </div>
                                  </li>

                              </ul>
                          </div>
                      </div>
                      {{-- <div class="contact-social-links">
                          <ul>
                              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          </ul>
                      </div> --}}
                  </div>
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12">
                  <div class="send-message-form">
                      <div class="title">
                          <h2>Liên hệ với chúng tôi</h2>
                          <span class="border"></span>
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
  <!--End Contact area-->

  <!--Start Google map area-->
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
  </section>
  <!--End Google map area-->
@stop
