@extends('layouts.master')

@section('title', 'Thông tin kỹ thuật viên')
@push('css')
<link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
@endpush
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin kỹ thuật viên</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update.dev') }}" method="post" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="file" class="d-none" name="avatar">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-12 col-md-3">
                                <div class="devt-box-avatar">
                                    <img src="{{ $user->avatar != '' || $user->avatar != null ? asset($user->avatar) : asset(config('mevivu-website.images.avatar-user')) }}"
                                        class="img-thumbnail" alt="Avatar">
                                    <div class="devt-icon-camera">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">*Email:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="email"
                                                    value="{{ old('email', $user->email) }}" name="email"
                                                    placeholder="Email" required
                                                    data-parsley-required-message="Trường này không được bỏ trống.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">*Họ và tên:</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" name="fullname"
                                                    value="{{ old('fullname', $user->fullname) }}"
                                                    placeholder="Họ và tên" required
                                                    data-parsley-required-message="Trường này không được bỏ trống.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">*Mật khẩu mới:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="password" value="" name="password" placeholder="Mật khẩu"
                                                    data-parsley-required-message="Trường này không được bỏ trống.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">*Xác nhận mật khẩu</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="password" value="" name="password_confirmation"
                                                    placeholder="Xác nhận mật khẩu"
                                                    data-parsley-equalto="input[name='password']"
                                                    data-parsley-equalto-message="Mật khẩu không khớp."
                                                    data-parsley-required-message="Trường này không được bỏ trống.">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">*Số điện thoại:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="text"
                                                    value="{{ old('phone', $user->phone) }}" name="phone"
                                                    placeholder="Số điện thoại"
                                                    data-parsley-pattern="/((09|03|07|08|05)+([0-9]{8})\b)/g" required
                                                    data-parsley-required-message="Số điện thoại không được để trống."
                                                    data-parsley-pattern-message="Số điện thoại không hợp lệ.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">*ID Quản trị:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="text"
                                                    value="{{ old('quantri_id', $user->quantri_id) }}" name="quantri_id"
                                                    placeholder="ID quản trị">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Lưu lại
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('.devt-box-avatar .devt-icon-camera i').click(function () {
            $('input[name="avatar"]').click();
        });

        $("input[name='avatar']").change(function(event) {
		/* Act on the event */
		if (this.files && this.files[0]) {
    	var reader = new FileReader();
    
	    reader.onload = function(e) {
	      $('.devt-box-avatar img').attr('src', e.target.result);
	    }
    
    	reader.readAsDataURL(this.files[0]); // convert to base64 string
    	}	
	});
    });
</script>
@endpush