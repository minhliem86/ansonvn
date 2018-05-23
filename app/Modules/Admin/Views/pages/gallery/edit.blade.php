@extends('Admin::layouts.default')

@section('title','CHI NHÁNH')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!!  Form::model($inst, ['route'=>['admin.branch.update',$inst->id], 'method'=>'put' ])!!}
                <div class="card-header">
                    <strong>CHI NHÁNH</strong>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Chi Nhánh</label>
                        <div class="col-md-9">
                            {!! Form::text('title', old('title'), ['class'=>'form-control', 'required']) !!}
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
                        <label class="col-md-3 col-form-label">Hình đại diện:</label>
                        <div class="col-md-9">
                            <div class="input-group">
                             <span class="input-group-btn">
                               <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary btn-sm text-white">
                                 <i class="fa fa-picture-o"></i> Choose
                               </a>
                             </span>
                                {{Form::hidden('img_url',old('img_url'), ['class'=>'form-control', 'id'=>'thumbnail' ])}}
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset('public/uploads/'.$inst->img_url)}}">
                        </div>
                    </div>
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

    <!--BT Upload-->
    <link rel="stylesheet" href="{{asset('/public/assets/admin')}}/js/plugins/bootstrap-input/css/fileinput.min.css">
    <script src="{{asset('/public/assets/admin')}}/js/plugins/bootstrap-input/js/plugins/sortable.min.js"></script>
    <script src="{{asset('/public/assets/admin')}}/js/plugins/bootstrap-input/js/plugins/purify.min.js"></script>
    <script src="{{asset('/public/assets/admin')}}/js/plugins/bootstrap-input/js/fileinput.min.js"></script>


    <script>
        const url = "{{url('/')}}"
        init_tinymce(url);
        // BUTTON ALONE
        init_btnImage(url,'#lfm');

        $(document).on('change', 'input[name=status]', function(){
            if($(this).prop('checked')){
                $(this).val(1);
            }else{
                $(this).val(0);
            }
        })

        $(document).ready(function(){
            $("#thumb-input").fileinput({
                uploadUrl: "{!!route('admin.gallery.store')!!}", // server upload action
                uploadAsync: false,
                showUpload: false,
                showCancel: false,
                showCaption: false,
                dropZoneEnabled : true,
                showBrowse: false,
                overwriteInitial: false,
                browseOnZoneClick: true,
                fileActionSettings:{
                    showUpload : false,
                    showZoom: false,
                    showDrag: false,
                    showDownload: false,
                    removeIcon: '<i class="fa fa-trash text-danger"></i>',
                },
                initialPreview: [
                    @foreach($inst->photos as $photo)
                        "{!!asset($photo->thumb_url)!!}",
                    @endforeach
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                        @foreach($inst->photos as $item_photo)
                    {'url': '{!! route("admin.gallery.AjaxRemovePhoto") !!}', key: "{!! $item_photo->id !!}", caption: "{!! $item_photo->filename !!}"},
                    @endforeach
                ],
                layoutTemplates: {
                    progress: '<div class="kv-upload-progress hidden"></div>'
                },
            });
            /*CHANGE STATUS*/
            $(document).on('change', 'input[name=status]', function(){
                if($(this).prop('checked')){
                    $(this).val(1);
                }else{
                    $(this).val(0);
                }
            })
        })


    </script>
@stop
