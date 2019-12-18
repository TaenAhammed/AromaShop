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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Products:</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox" /></th>
                            <th>Name</th>
                            <th>Image(s)</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
                <form id="deleteForm" action="" method="post">
                    @csrf
                    @method('delete')
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="deleteButton" class="btn btn-danger">Yes, Delete!</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection


@section('scripts')
@include('admin.includes.scripts')
<script>
    $(function () {
        $('#example1').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "/admin/products/getProductsJson",
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": 0,
                        "render": function (data, type, row) {
                            return `<input type='checkbox' value='${data}'/>`;
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 2,
                        "render": function (data, type, row) {
                            return `<img style="width:100px" src='${data}'/>`;
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 5,
                        "render": function (data, type, row) {
                            return `<button type="submit" class="btn btn-info btn-sm" onclick="window.location.href='/admin/products/${data}/edit'" value='${data}'>
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>
                            <button type="submit" class="btn btn-danger btn-sm show-bs-modal" href="#" data-id='${data}' value='${data}'>
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>`;
                        }
                    }
                ]
            });

            $('#example1').on('click', '.show-bs-modal', function (event) {
                var id = $(this).data("id");
                var modal = $("#modal-default");
                modal.find('.modal-body p').text('Are you sure you want to delete this record?')
                $("#deleteForm").attr("action", "/admin/products/" + id );
                modal.modal('show');
            });

            $("#deleteButton").click(function(){
                $("#deleteForm").submit();
            });
    });
</script>
@endsection