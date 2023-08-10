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
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" id="" placeholder="Hãy nhập tên người dùng">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Hãy nhập Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Mật khẩu</label>
                            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Hãy nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option>--Chọn quyền---</option>
                                <option>Admin</option>
                                <option>User</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-danger">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-success">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
