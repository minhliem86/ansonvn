@extends('Admin::layouts.default')

@section('title','Liên Hệ')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>KHÁCH LIÊN HỆ</strong>
                </div>
                <div class="card-body">
                    {{Form::model($inst, ['route'=>['admin.contact.destroy',$inst->id], 'method'=>'DELETE' ])}}
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tên Khách Hàng:</label>
                        <div class="col-md-10">
                            {{Form::text('name',old('name'), ['class'=>'form-control', 'disabled'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Số Điện Thoại:</label>
                        <div class="col-md-10">
                            {{Form::text('phone',old('phone'), ['class'=>'form-control', 'disabled'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email:</label>
                        <div class="col-md-10">
                            {{Form::text('email',old('email'), ['class'=>'form-control', 'disabled'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ý Kiến:</label>
                        <div class="col-md-10">
                            {!! Form::textarea('messages',old('messages'), ['class'=> 'form-control', 'disabled']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
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

        $(document).on('change', 'input[name=status]', function(){
            if($(this).prop('checked')){
                $(this).val(1);
            }else{
                $(this).val(0);
            }
        })

    </script>
@stop
