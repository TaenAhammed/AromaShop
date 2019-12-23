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
                    <h1 class="m-0 text-dark">Product Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                <h3 class="card-title">Create Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="/admin/products" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Product Name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label><br>
                        <input type="file" id="image" placeholder="Product Image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Product Price" name="price">
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control select2" style="width: 100%;" id="category" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control" id="discount" placeholder="Product Discount"
                            name="discount">
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
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@component('admin.components.alert')
@endcomponent

@endsection