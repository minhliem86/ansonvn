@extends('Frontend::layouts.default')

@section('content')
  @include('Frontend::layouts.banner')
  <!--Start services area-->
  <section class="services-area">
      <div class="container">
          <div class="sec-title">
              <h1>Chúng tôi cung cấp các dịch vụ</h1>
          </div>
          <div class="row">
              <!--Start single service item-->
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="single-service-item">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/service/nhavanphong.jpg" alt="Tòa Nhà Văn Phòng">
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
                              <h3>Cho thuê bất động sản</h3>
                              {{-- <p>Chemical Research expertise in for you manipulating chemicals energy.</p> --}}
                          </div>
                      </div>
                  </div>
              </div>
              <!--End single service item-->
              <!--Start single service item-->
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="single-service-item">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/service/thethao.jpg" alt="Công Trình Thể Thao">
                      </div>
                      <div class="text-holder">
                          <div class="text">
                              <h3>Thi công công trình thể thao</h3>
                          </div>
                      </div>
                  </div>
              </div>
              <!--End single service item-->
              <!--Start single service item-->
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="single-service-item">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/service/tuvanthietke.jpg" alt="Tư Vấn Thiết Kế">
                      </div>
                      <div class="text-holder">
                          <div class="text">
                              <h3>Tư vấn thiết kế xây dựng</h3>
                          </div>
                      </div>
                  </div>
              </div>
              <!--End single service item-->
          </div>
          <div class="row">
              <!--Start single service item-->
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="single-service-item">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/service/nhadandung.jpg" alt="Nhà Dân Dụng">
                      </div>
                      <div class="text-holder">
                          <div class="text">
                              <h3>Thi công công trình dân dụng</h3>
                          </div>
                      </div>
                  </div>
              </div>
              <!--End single service item-->
              <!--Start single service item-->
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="single-service-item">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/service/son.jpg" alt="Sơn OBIDO">
                          <div class="overlay">
                              <div class="box">
                                  <div class="content">
                                      <a class="thm-btn yellow-bg" target="_blank" href="http://obido.com.vn/">Liên kết nhanh</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="text-holder">
                          <div class="text">
                              <h3>Sản xuất sơn và chất phủ bề mặt</h3>
                          </div>
                      </div>
                  </div>
              </div>
              <!--End single service item-->
              <!--Start single service item-->
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="single-service-item">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/service/cokhianson.jpg" alt="Awesome Image">
                          <div class="overlay">
                              <div class="box">
                                  <div class="content">
                                      <a class="thm-btn yellow-bg" target="_blank" href="http://www.ansonvietnam.com/">Liên kết nhanh</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="text-holder">
                          <div class="text">
                              <h3>Thiết kế, chế tạo máy cơ khí</h3>
                          </div>
                      </div>
                  </div>
              </div>
              <!--End single service item-->
          </div>
      </div>
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
          <div class="row">
              <!--Start single team member-->
              <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="single-team-member clearfix">

						<div class="img-holder">
						  <img src="{{asset('public/assets/Frontend')}}/images/product/sonngoaithat.jpg" alt="Sơn Ngoại Thất">
						  <!-- <div class="overlay-box">
						      <div class="box">
						          <div class="content">
						              <ul class="member-social-links">
						                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						              </ul>
						          </div>
						      </div>
						  </div> -->
						</div>
						<div class="text-holder">
						  <h3>Sơn Ngoại Thất OBIDO</h3>
						  <p>Bảo vệ công trình trong mọi điều kiện thời tiết</p>
						</div>

                  </div>
              </div>
              <!--End single team member-->
              <!--Start single team member-->
              <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="single-team-member clearfix">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/product/sonnoithat.jpg" alt="Sơn Nội Thất">
                      </div>
                      <div class="text-holder">
                          <h3>Sơn Nội Thất OBIDO</h3>
                          <p>Làm nổi bật không gian nội thất của bạn</p>
                      </div>
                  </div>
              </div>
              <!--End single team member-->
              <!--Start single team member-->
              <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="single-team-member clearfix">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/product/chatchongtham.jpg" alt="Chất Chống Thấm">
                      </div>
                      <div class="text-holder">
                          <h3>Chất Chống Thấm</h3>
                          <p>Người bảo vệ công trình trước sự ăn mòn của thời tiết</p>
                      </div>
                  </div>
              </div>
              <!--End single team member-->
              <!--Start single team member-->
              <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="single-team-member clearfix">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/product/botngoaitroi.jpg" alt="Bột Bả Ngoài Trời">
                      </div>
                      <div class="text-holder">
                          <h3>Bột Bả Cao Cấp Ngoài trời</h3>
                          <p>Bột Bả Cao Cấp OBIDO</p>
                      </div>
                  </div>
              </div>
              <!--End single team member-->

              <!--Start single team member-->
              <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="single-team-member clearfix">
                      <div class="img-holder">
                          <img src="{{asset('public/assets/Frontend')}}/images/product/bottrongnha.jpg" alt="Bột Bả Trong Nhà">
                      </div>
                      <div class="text-holder">
                          <h3>Bột Bả Cao Cấp Trong Nhà</h3>
                          <p>Bột Bả Cao Cấp OBIDO</p>
                      </div>
                  </div>
              </div>
              <!--End single team member-->
          </div>
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
