@extends('layouts.master')

@section('title', 'Thêm khách hàng')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Kiểm tra khách hàng</h3>
                </div>
                <div class="card-body">
                    <form id="formCheckInfoCustomer" class="form-horizontal" data-modal="#checkInfoModal"
                        action="{{ route('check.info.customer') }}" method="get" data-parsley-validate>
                        <div class="form-group">
                            <label class="control-label">*Tên đăng nhập:</label>
                            <input class="form-control" type="text" value="{{ old('username') }}" name="username"
                                placeholder="Tên đăng nhập" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="form-group">
                            <label class="control-label">*Mật khẩu:</label>
                            <input class="form-control" type="password" name="password" value=""
                                placeholder="Mật khẩu" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="form-group">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Kiểm tra
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="checkInfoModal" tabindex="-1" aria-labelledby="checkInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('store.customer') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="checkInfoModalLabel">Thông tin khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="api_id" value="">
                    <div class="form-group">
                        <label class="control-label">*Họ và tên:</label>
                        <input type="text" class="form-control" name="fullname" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">*Email:</label>
                        <input type="text" class="form-control" name="email" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">*Số điện thoại:</label>
                        <input type="text" class="form-control" name="phone" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">*Địa chỉ:</label>
                        <input type="text" class="form-control" name="address" value="" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Thêm khách hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('public/assets/js/manager/customer.js') }}"></script>
@endpush