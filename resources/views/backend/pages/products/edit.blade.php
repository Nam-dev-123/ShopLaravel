@extends('backend.layouts.master')

@section('content-header')
    Chỉnh sửa sản phẩm
@endsection

@section('sidebar-item')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Sản phẩm</a></li>
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
                    <h3 class="card-title">Chỉnh sửa sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('products.update',['id' => $product['id']]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="{{ $product['name'] }}">
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option>--Chọn danh mục---</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product['category_id'] == $category->id ? 'selected' : ''  }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>
                                    <input name="sale_price" type="text" class="form-control" value="{{ $product['sale_price'] }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input name="origin_price" type="text" class="form-control" value="{{ $product['origin_price'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea name="content" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                {{ $product['content'] }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái sản phẩm</label>
                            <select name="status" class="form-control select2" style="width: 100%;">
                                <option value="0" {{ $product['status'] == 0 ? 'selected' : '' }}>Đang nhập</option>
                                <option value="1" {{ $product['status'] == 1 ? 'selected' : '' }}>Mở bán</option>
                                <option value="-1" {{ $product['status'] == -1 ? 'selected' : '' }}>Hết hàng</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-danger">Hủy bỏ</a>
                        <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
