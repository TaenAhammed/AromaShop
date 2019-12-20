@extends('admin.layouts.master')


@section('header')
@include('admin.includes.header')
@endsection


@section('navbar')
@include('admin.includes.navbar')
@endsection

@section('sidebar')
@include('admin.includes.sidebar')
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('categories.create') }}">Create</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Category Name" name="name">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->



</div>
<!-- /.content-wrapper -->
@endsection


@section('scripts')
@include('admin.includes.scripts')
@endsection