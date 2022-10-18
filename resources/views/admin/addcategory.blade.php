@extends('master.app')
@section('title', 'Add Category')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <form action="{{route('store-category')}}" method="POST" enctype="multipart/form-data">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{old('name')}}">
                                </div>
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                <div class="form-group">
                                    <label>Category Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{old('title')}}">
                                </div>
                                <span class="text-danger">@error('title') {{$message}} @enderror</span>
                                <div class="form-group">
                                    <label>Category Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-danger">@error('image') {{$message}} @enderror</span>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" checked value="1">
                                                <label class="form-check-label">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="0">
                                                <label class="form-check-label">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection