@extends('master.app')
@section('title', 'View Items')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Category Listing</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">View Items</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sub Categories Listing with status</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($item as $data) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>{{$data->name}}</td>
                                            <td style="width: 40%;">{{$data->title}}</td>
                                            <td>
                                                <img src="{{ asset('uploads/items/'.$data->image)}}" width="50px" height="50px" alt="">
                                            </td>
                                            <td>
                                                @if($data->status == '1')
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Block</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('admin/edit-item/' .$data->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('admin/delete-item/' .$data->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
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