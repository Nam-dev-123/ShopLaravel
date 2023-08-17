@extends('backend.layouts.master')

@section('content-header')
    Tạo người dùng
@endsection

@section('sidebar-item')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Người dùng</a></li>
        <li class="breadcrumb-item">Tạo mới</li>
    </ol>
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tạo mới người dùng</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('users.create') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Tên</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName" placeholder="Hãy nhập tên người dùng">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">Số điện thoại</label>
                            <input name="phone" type="text" class="form-control" id="exampleInputPhone" placeholder="Hãy nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" id="exampleInputAddress" placeholder="Hãy nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Hãy nhập Email">
                        </div>
                        <div class="form-group">
                            <label>Vai trò</label>
                            <select name="role" class="form-control select2" style="width: 100%;">
                                <option>--Chọn vai trò---</option>
                                <option value="1">Admin</option>
                                <option value="0">Người dùng</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-danger">Hủy bỏ</a>
                        <button type="submit" class="btn btn-success">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
