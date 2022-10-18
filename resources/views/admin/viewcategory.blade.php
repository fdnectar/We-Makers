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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Category Name</th>
                                        <th>Category Title</th>
                                        <th>Category Image</th>
                                        <th>Category Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($category as $data) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->title}}</td>
                                            <td>
                                                <img src="{{ asset('uploads/category/'.$data->image)}}" width="50px" height="50px" alt="">
                                            </td>
                                            <td>
                                                @if($data->status == '1')
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Block</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Category Name</th>
                                        <th>Category Title</th>
                                        <th>Category Image</th>
                                        <th>Category Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection