@extends('Frontend::layouts.default')

@section('css')
    <link rel="stylesheet" href="{{asset('public/assets/Frontend')}}/css/customize.css">
@stop

@section("content")
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area" style="background-image: url({{asset('public/assets/Frontend')}}/images/banner/banner03.jpg);">
        <div class="container text-center">
            <h1>Chi Nhánh</h1>
        </div>
    </section>
    <!--Start branch-->
    <section class="branch">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>{!! $branch->title !!}</h2>
                        <span class="border"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 ">
                    <div class="left-wrapper">
                        <div class="info">
                            <img src="{!! asset('public/uploads/'.$branch->img_url) !!}" class="img-responsive logo" alt="{!! $branch->title !!}">
                            <div class="branch-content">
                                <p class="info-text"><b>Địa Chỉ:</b> {!! $branch->address !!}
                                </p>
                                <p class="info-text"><b>Điện Thoại:</b> {!! $branch->phone !!}</p>
                                <p class="info-text">{!! $branch->opentime !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="right-wrapper">
                        <div class="map-content">
                            <div class="form-group">
                                <label class="control-label sr-only" for="inputGroupSuccess4">Input group with success</label>
                                <div class="input-group">
                                    <input type="text" name="from_gmap" class="form-control" placeholder="Nhập địa chỉ của bạn">
                                    <span class="input-group-addon">
                                        <button type="button" id="director">Chỉ Đường</button>
                                    </span>
                                </div>
                            </div>
                            <div id="map-canvas"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--End choosing area-->
@stop

@section("script")
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnRfCExRjCqQ9wa2fmB4lUw6Mtr6KvA8c"></script>
    <script src="{!! asset('public/assets/Frontend') !!}/js/map.js"></script>

    <script>
        $(document).ready(function(){
            @php
                $data_map = explode(',',$branch->map);
            @endphp
            initMap({!! $data_map[0] !!},{!! $data_map[1] !!});
            $('button#director').click(function(){
                var address = $('input[name=from_gmap]').val();
                $('#map-canvas').empty();
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();
                        MapRoute({!! $data_map[0] !!},{!! $data_map[1] !!},latitude,longitude);
                    }
                });
            })

        })
    </script>
@stop