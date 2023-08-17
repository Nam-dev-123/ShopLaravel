@extends('backend.layouts.master')

@section('content-header')
    Chỉnh sửa người dùng
@endsection

@section('sidebar-item')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Người dùng</a></li>
        <li class="breadcrumb-item">Chỉnh sửa</li>
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
                <form role="form" action="{{ route('users.update', ['id' => $user['id']]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Tên</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName" value="{{ $user['name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">Số điện thoại</label>
                            <input name="phone" type="text" class="form-control" id="exampleInputPhone" value="{{ $user['phone'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" id="exampleInputAddress" value="{{ $user['address'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{ $user['email'] }}">
                        </div>
                        <div class="form-group">
                            <label>Vai trò</label>
                            <select name="role" class="form-control select2" style="width: 100%;">
                                <option>--Chọn vai trò---</option>
                                <option value="1" {{ $user['role'] == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ $user['role'] == 0 ? 'selected' : '' }}>Người dùng</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-danger">Hủy bỏ</a>
                        <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
