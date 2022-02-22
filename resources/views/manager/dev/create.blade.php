@extends('layouts.master')

@section('title', 'Thêm kỹ thuật viên')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Thêm kỹ thuật viên</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('store.dev') }}" method="post" data-parsley-validate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">*Email:</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="email" value="{{ old('email') }}" name="email"
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
                                            value="{{ old('fullname') }}" placeholder="Họ và tên" required
                                            data-parsley-required-message="Trường này không được bỏ trống.">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">*Mật khẩu:</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" value="" name="password" required placeholder="Mật khẩu"
                                            data-parsley-required-message="Trường này không được bỏ trống.">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">*Xác nhận mật khẩu</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" value="" name="password2" placeholder="Xác nhận mật khẩu" required data-parsley-equalto="input[name='password']" data-parsley-equalto-message="Mật khẩu không khớp."
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
                                        <input class="form-control" type="text" value="{{ old('phone') }}" name="phone"
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
                                        <input class="form-control" type="text" value="{{ old('quantri_id') }}"
                                            name="quantri_id" placeholder="ID quản trị">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Lưu lại
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection