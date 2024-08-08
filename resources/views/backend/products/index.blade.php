@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('products.create')}}">Create Product</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Mass</th>
                    <th>Density</th>
                    <th>Refractive Index</th>
                    <th>Cut & Shape</th>
                    <th>Color</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection
@section('scripts')
    <script>
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url : "/products/",
                error : function(xhr, textStatus, errorThrown) {
                }
            },
            "columns" : [
                {
                    "data" : "id",
                },
                {
                    "data" : "product_id"
                },
                {
                    "data" : "brand_name",
                },
                {
                    "data" : "mass",
                },
                {
                    "data" : "density",
                },
                {
                    "data" : "refractive_index",
                },
                {
                  "data" : 'cut_shape',
                },
                {
                  "data" : 'color',
                },
                {
                  "data" : 'image',
                },
                {
                  "data" : "action",
                }
            ]
        });
        $(document).on('click','.delete',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
          title: 'Are you sure, you want to delete?',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url : '/products/' + id,
              type : 'DELETE',
              success : function(){
                table.ajax.reload();
              }
            });
          }
        }
      )
      });
    </script>
    @endsection