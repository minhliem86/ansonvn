@extends('Admin::layouts.default')

@section('title','CHI NHÁNH')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!! Form::open(['route'=>'admin.branch.store', 'class' =>'form']) !!}
                <div class="card-header">
                    <strong>CHI NHÁNH</strong>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Chi Nhánh</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Địa chỉ</label>
                        <div class="col-md-9">
                            {!! Form::text('address', old('address'), ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Phone</label>
                        <div class="col-md-9">
                            {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Thời gian làm việc</label>
                        <div class="col-md-9">
                            {!! Form::text('opentime', old('opentime'), ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Hotline</label>
                        <div class="col-md-9">
                            {!! Form::text('hotline', old('hotline'), ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Google Map</label>
                        <div class="col-md-9">
                            {!! Form::text('map', old('map'), ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" >Hình đại diện:</label>
                        <div class="col-md-9">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Chọn
                                </a>
                            </span>
                                <input id="thumbnail" class="form-control" type="hidden" name="img_url">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <div class="card-footer">
                    <div class="col-md-9 offset-md-3">
                        <a href="{!! url()->previous() !!}" class="btn btn-danger text-white"><i class="fa fa-arrow-left"></i> Back</a>
                        <button class="btn btn-success" type="submit"><i class="fa fa-dot-circle-o"></i> Save</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('public')}}/vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="{{asset('public/assets/admin/js/script.js')}}"></script>
    <script>
        const url = "{{url('/')}}"
        init_tinymce(url);
        // BUTTON ALONE
        init_btnImage(url,'#lfm');

    </script>
@stop
