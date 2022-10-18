@extends('master.app')
@section('title', 'Edit Items')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Items</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Items</li>
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
                            <h3 class="card-title">Edit Items</h3>
                        </div>
                        <form action="{{url('admin/update-item/'.$item->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control" value="{{$item->category_id}}">
                                        <option value="">Select Category</option>
                                        @foreach($category as $data)
                                        <option value="{{$data->id}}" {{$item->category_id == $data->id ? 'selected' : ''}}>{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="text-danger">@error('category_id') {{$message}} @enderror</span>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$item->name}}">
                                </div>
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{$item->title}}">
                                </div>
                                <span class="text-danger">@error('title') {{$message}} @enderror</span>

                                <div class="form-group">
                                    <label>Image</label>
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
                                                <input class="form-check-input" type="radio" name="status" value="1" {{$item->status == '1' ? 'checked' : ''}}>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="0" {{$item->status == '0' ? 'checked' : ''}}>
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