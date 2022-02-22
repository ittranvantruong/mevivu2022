@extends('layouts.master')

@section('title', 'Danh sách kỹ thuật viên')

@section('content')
<div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="font-weight-bold text-primary mb-0">Danh sách kỹ thuật viên</h6>
                <a href="{{URL::to('/add-supporter')}}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Thêm kỹ thuật viên
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Mã số</th>
                          <th>Họ tên</th>
                          <th>Email</th>
                          <th>Số điện thoại</th>
                          <th>Chức vụ</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>

                      <tbody>
                          @foreach ($users as $item)
                          <tr>
                          <td>#KTV{{$item->id}}</td>
                          <td>{{$item->fullname}}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->phone}}</td>
                            <td>Kỹ thuật viên</td>
                            <td><a href="{{URL::to('edit-supporter/'.$item->id)}}" class="btn btn-info btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                  <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Chỉnh sửa hoặc Xóa</span>
                              </a></td>
                          </tr>
                          @endforeach


                      </tbody>
                    </table>
                  </div>
            </div>
        </div>

    </div>
@endsection

@push('plugin-js')

<script src="{{asset('public/sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('public/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

@endpush

@push('js')

    <script>
        $(document).ready(function() {
            customDatatable();  
        });
    </script>

@endpush