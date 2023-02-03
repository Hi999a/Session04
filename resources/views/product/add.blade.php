@extends('master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 ">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control @error('name') border-danger @enderror" name="name" value="{{old('name')}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" class="form-control" name="price" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                    <div class="form-group">
                      <label for="">Category</label>
                      <select class="form-control" name="category_id" id="">
                        @foreach($category as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Iamge</label>
                    <input type="file" class="form-control" name="image" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="d-block">Status</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="status" id="" value="0">Ẩn
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="status" id="" value="1" checked> Hiển
                        </label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
            </div>
        </div>
    </div>

@stop