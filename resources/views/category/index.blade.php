@extends('master')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{Session::get('success')}}</strong>
    </div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 ">
                <a href="{{route('category.add')}}" class="btn btn-success">Thêm mới danh mục</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($categories as $value)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->status ? 'Hiện' : 'Ẩn'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop