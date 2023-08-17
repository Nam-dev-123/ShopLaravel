@extends('backend.layouts.master')

@section('content-header')
    Tạo sản phẩm
@endsection

@section('sidebar-item')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Sản phẩm</a></li>
        <li class="breadcrumb-item">Tạo sản phẩm</li>
    </ol>
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tạo sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('products.create') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Điền tên sản phẩm ">
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option>--Chọn danh mục---</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>
                                    <input name="sale_price" type="text" class="form-control" placeholder="Điền giá khuyến mại">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input name="origin_price" type="text" class="form-control" placeholder="Điền giá gốc">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea name="content" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái sản phẩm</label>
                            <select name="status" class="form-control select2" style="width: 100%;">
                                <option>--Chọn trạng thái---</option>
                                <option value="0">Đang nhập</option>
                                <option value="1">Mở bán</option>
                                <option value="-1">Hết hàng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-danger">Hủy bỏ</a>
                        <button type="submit" class="btn btn-success">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
