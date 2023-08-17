@extends('backend.layouts.master')

@section('content-header')
    Danh sách sản phẩm
@endsection

@section('sidebar-item')
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Sản phẩm</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
        </ol>
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sản phẩm mới nhập</h3>

                    <div class="card-tools">
                        <form action="{{ route('products.index') }}" method="get">
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
                            <th>Tên sản phẩm</th>
                            <th>Giá ban đầu</th>
                            <th>Giảm giá(%)</th>
                            <th>Giá mới</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $product['id'] }}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ number_format($product['origin_price'],0,'.',',') }}</td>
                                <td>{{ $product['discount_percent'] }}</td>
                                <td>{{ $product['sale_price'] }}</td>
                                <td>{{ $product->getCategory->name }}</td>
                                <td>
                                    @if($product['status']==0)
                                        <span class="badge badge-info">Đang nhập</span>
                                    @elseif($product['status']==1)
                                        <span class="badge badge-success">Mở bán</span>
                                    @elseif($product['status']==-1)
                                        <span class="badge badge-danger">Hết hàng</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', ['id' => $product['id']]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('products.delete', ['id' => $product['id']]) }}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bản ghi này?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="expandable-body">
                                <td colspan="8">
                                    <p>
                                        {{ $product['content'] }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div>
                        {{ $products->appends(request()->all())->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
