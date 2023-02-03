@extends('master')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{Session::get('success')}}</strong>
    </div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 ">
                <a href="{{route('product.add')}}" class="btn btn-success">Thêm mới sản phẩm</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $value)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->price}}</td>
                            <td><img src="{{asset('uploads')}}/{{$value->image}}" alt="" width="100px"></td>
                            <td>{{$value->categoryName}}</td>
                            <td>{{$value->status ? 'Hiện' : 'Ẩn'}}</td>
                            <td>
                                <a href="{{route('product.edit', $value->id)}}" class="btn btn-primary">Sửa</a>
                                <a href="{{route('product.delete',$value->id)}}" onclick="return confirm('Chac chan ?')" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop