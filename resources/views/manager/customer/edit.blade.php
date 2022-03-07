@extends('layouts.master')

@section('title', 'Thông tin khách hàng')


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin khách hàng</h3>
                </div>
                <div class="card-body">
                    <form class="row form-horizontal" action="{{ route('update.customer') }}" method="post"
                        enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="col-md-6 col-12 form-group">
                            <label class="control-label">*Họ và tên:</label>
                            <input class="form-control" type="text" name="fullname" value="{{ $user->fullname }}"
                                placeholder="Họ và tên" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>

                        <div class="col-md-6 col-sm-12 form-group">
                            <label class="control-label">*Email:</label>
                            <input class="form-control" type="email" value="{{ $user->email }}" name="email" placeholder="Email" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label class="control-label">*Số điện thoại:</label>
                            <input class="form-control" type="text" value="{{ $user->phone }}" name="phone" readonly>
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label class="control-label">Địa chỉ:</label>
                            <input class="form-control" type="text" name="address" value="{{ $user->address }}"
                                placeholder="Địa chỉ" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label class="control-label">*Mật khẩu mới:</label>
                            <input class="form-control" type="password" value="" name="password" placeholder="Mật khẩu">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label class="control-label">*Xác nhận mật khẩu</label>
                            <input class="form-control" type="password" value="" name="password_confirmation"
                                placeholder="Xác nhận mật khẩu" data-parsley-equalto="input[name='password']"
                                data-parsley-equalto-message="Mật khẩu không khớp."
                                data-parsley-required-message="Trường này không được bỏ trống.">
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

        $("input[name='avatar']").change(function (event) {
            /* Act on the event */
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.devt-box-avatar img').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });
    });
</script>
@endpush