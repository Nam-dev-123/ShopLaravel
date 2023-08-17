@extends('backend.layouts.master')

@section('content-header')
    Danh sách người dùng
@endsection

@section('sidebar-item')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
        <li class="breadcrumb-item active">Danh sách</li>
    </ol>
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách người dùng</h3>

                    <div class="card-tools">
                        <form action="{{ route('users.index') }}" method="get">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input name="search" type="search" class="form-control float-right" placeholder="Search" value="{{ $search }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Vai trò</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['phone'] }}</td>
                                <td>
                                    @if($user['role'] == 1)
                                        <span class="badge badge-success">admin</span>
                                    @elseif($user['role'] == 0)
                                        <span class="badge badge-info">người dùng</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', ['id' => $user['id']]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('users.delete', ['id' => $user['id']]) }}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bản ghi này?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="expandable-body">
                                <td colspan="6">
                                    <p>
                                        {{ $user['address'] }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->appends(request()->all())->links() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
