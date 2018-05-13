@extends('Frontend::layouts.default')

@section('css')
  <link rel="stylesheet" href="{{asset('public/assets/Frontend')}}/css/customize.css">
@stop

@section('content')
  <!--Start breadcrumb area-->
  <section class="breadcrumb-area" style="background-image: url({{asset('public/assets/Frontend')}}/images/banner/banner03.jpg);">
  	<div class="container text-center">
  		<h1>Về Chúng tôi</h1>
  	</div>
  </section>
  <!--End breadcrumb area-->

  <!--Start welcome Industry area-->
  <section class="welcome-industry-area">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="video-gallery-bg">
                      <div class="video-gallery">
                          <img src="{{asset('public/assets/Frontend')}}/images/about/about01.jpg" alt="An Sơn">

                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="content">
                      <div class="sec-title">
                          <h1>Về Chúng tôi</h1>
                      </div>
                      <h3>Tên giao dịch: <b>CÔNG TY CỔ PHẦN ĐẦU TƯ-THƯƠNG MẠI AN SƠN</b></h3>
                      <div class="wrap-content-about">
                        <p class="title-post"><b>1. Các ngành nghề kinh doanh chính:</b></p>
                        <ul>
                          <li>Xây dựng các công trình giao thông, thủy lợi, dân dụng, công nghiệp, kết cấu hạ tầng khu công nghiệp, khu đô thị.</li>
                          <li>Thi công các loại công trình thể thao sân Tennis, Cầu lông, sân bóng đá Mini….</li>
                          <li>Thi công chống thấm, sơn Epoxy các loại công trình.</li>
                          <li>Mua bán, cho thuê, máy móc, thiết bị dùng trong xây dựng.</li>
                          <li>Buôn bán vật liệu xây dựng, hàng trang trí nội thất.</li>
                          <li>Mua, bán, cho thuê bất động sản.</li>
                        </ul>
                        <p class="title-post"><b>2. Quá trình hình thành và phát triển</b></p>
                        <p><b>Công Ty Cổ Phần Đầu Tư - Thương Mại An Sơn</b> được thành lập trong thời kỳ đất nước đang trên đà phát triển và đáp ứng nhu cầu xây dựng là một trong những nhiệm vụ cấp thiết của Chính phủ nói chung và Thành phố Hồ Chí Minh nói riêng. Trong suốt quá trình thành lập và phát triển, đến nay Công Ty Cổ Phần Đầu Tư -Thương Mại  An Sơn đã vươn lên trở thành một Công ty uy tín, có chỗ đứng vững chắc trên thị trường xây dựng, đóng góp cho đất nước những công trình dân dụng, công nghiệp, hạ tầng cơ sở, giao thông thuỷ lợi v.v... </p>
                        <p>Đến nay Công ty đã tham gia thi công nhiều công trình xây dựng trên địa bàn TP.Hồ Chí Minh và các tỉnh lân cận. Trọng điểm là các công trình thể thao thi đấu chuyên nghiệp như: sân Tennis có mái che, sân bóng đá cỏ nhân tạo, sân đa năng v.v... đạt tiêu chuẩn quốc tế với hệ thống sơn Latexite, Nova nhập khẩu trực tiếp từ Mỹ. </p>
                        <p>Ngoài ra chúng tôi có nhiều năm kinh nghiệm trong lĩnh vực sản xuất, kiểm định và phân phối vật liệu xây dựng, hóa chất chống thấm và chất phụ gia. Hơn nữa, Công ty CPĐT – TM An Sơn được chỉ định là đại diện thi công cho nhiều hãng nước ngoài như: Shell (Hoa Kỳ), Sto SEA Pte.(Singapore), Ltd., WR Grace (Đức)... các công trình do Công ty thi công đều đạt chất lượng tốt, đáp ứng đầy đủ các yêu cầu kỹ mỹ thuật và luôn được các chủ đầu tư đánh giá cao.</p>
                        <p>Hiện nay, công ty An Sơn cung cấp ra thị trường nhãn hiệu Sơn nước OBIDO đạt tiêu chuẩn ISO  9001:2008 với sự chuyển giao công thức từ Hoa Kỳ, công nghệ màu Châu Âu đột phá cùng đội ngũ kỹ thuật giàu kinh nghiệm không ngừng cải tiến để sơn OBIDO đạt chất lượng cao nhất, thân thiện với môi trường và phù hợp với điệu kiện khí hậu của Việt Nam. </p>
                        <p>Nguyên liệu sản xuất được áp dụng các nguyên tắc kiểm tra đầu vào nghiêm ngặt, được nhập khẩu từ những tập đoàn hóa chất nổi tiếng như DOW CHEMICAL (Mỹ), ROHM & HASS (Mỹ), BASF (Đức), FFM (Mỹ)...</p>
                        <p><b>Công Ty Cổ Phần Đầu Tư -  Thương  Mại An Sơn</b> mong muốn là địa chỉ tin cậy của khách hàng. Chúng tôi sẽ là người bạn, người đối tác chân thành luôn mang đến những công trình bền vững.</p>
                      </div>

                  </div>
              </div>
          </div>
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
