@extends('Admin::layouts.default')

@section('title','Sản Phẩm')

@section('css')
    <style>
        /* Mimic table appearance */
        div.album{
            margin:10px 0;
        }
        div#actions{
            margin-bottom:10px;
        }
        div.table {
            display: table;
        }
        div.table .file-row {
            display: table-row;
        }
        div.table .file-row > div {
            display: table-cell;
            vertical-align: top;
            border-top: 1px solid #ddd;
            padding: 8px;
        }
        div.table .file-row:nth-child(odd) {
            background: #f9f9f9;
        }



        /* The total progress gets shown by event listeners */
        #total-progress {
            opacity: 0;
            transition: opacity 0.3s linear;
        }

        /* Hide the progress bar when finished */
        #previews .file-row.dz-success .progress {
            opacity: 0;
            transition: opacity 0.3s linear;
        }

        /* Hide the delete button initially */
        #previews .file-row .delete {
            display: none;
        }

        /* Hide the start and cancel buttons and show the delete button */

        #previews .file-row.dz-success .start,
        #previews .file-row.dz-success .cancel {
            display: none;
        }
        #previews .file-row.dz-success .delete {
            display: block;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!!  Form::model($inst, ['route'=>['admin.product.update',$inst->id], 'method'=>'put', 'files' => true ])!!}
                <div class="card-header">
                    <strong>SẢN PHẨM</strong>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="category">Danh Mục</label>
                        <div class="col-md-9">
                            {!! Form::select('category_id', ['' => 'Chọn Danh Mục']+$category, old('category_id'), ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Sản Phẩm</label>
                        <div class="col-md-9">
                            {!! Form::text('name', old('name'), ['class'=> 'form-control', 'required'] ) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="description">Mô Tả</label>
                        <div class="col-md-9">
                            {!! Form::textarea('description',old('description'), ['class'=>'form-control my-editor','rows' => 1,]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="description">Sắp xếp</label>
                        <div class="col-md-9">
                            {{Form::text('order',old('order'), ['class'=>'form-control', 'placeholder'=>'order'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="description">Trạng thái</label>
                        <div class="col-md-9">
                            <label class="switch switch-icon switch-success-outline">
                                <input type="checkbox" class="switch-input" name="status" value="{!! $inst->status ? 1 : 0 !!}" {!! $inst->status ? "checked" : null  !!} data-id="{!! $inst->id !!}">
                                <span class="switch-label" data-on="" data-off=""></span>
                                <span class="switch-handle"></span>
                            </label>
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
                    <!--/.row-->

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Hình Chi Tiết (opt)</label>
                        <div class="col-md-9">
                            <div class="photo-container">
                                <input type="file" name="thumb-input[]" id="thumb-input" multiple >
                            </div>
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

        $(document).ready(function(){
            $(document).ready(function(){
                $("#thumb-input").fileinput({
                    uploadUrl: "{!!route('admin.product.store')!!}", // server upload action
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
                        {'url': '{!! route("admin.product.AjaxRemovePhoto") !!}', key: "{!! $item_photo->id !!}", caption: "{!! $item_photo->filename !!}"},
                        @endforeach
                    ],
                    layoutTemplates: {
                        progress: '<div class="kv-upload-progress hidden"></div>'
                    },
                });
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

        function updatePhoto(e, id){
            var value = e.parentNode.previousElementSibling.childNodes[1].value;
            $.ajax({
                url: '{{route("admin.product.AjaxUpdatePhoto")}}',
                type: 'POST',
                data:{id_photo: id, value: value, _token:$('meta[name="csrf-token"]').attr('content')},
                success:function(data){
                    if(!data.error){
                        alertify.success('Cập nhật thay đổi.');
                    }
                }
            })
        }

    </script>
@stop
