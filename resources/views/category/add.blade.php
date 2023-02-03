@extends('master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 ">
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter email">
                    
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