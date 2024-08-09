@extends('backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products Detail Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success me-3">Edit</a>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Brand Name : {{ $product->brand_name }}</h5>
                                <p class="card-text">Mass : {{ $product->mass }} kg</p>
                                <p class="card-text">Density : {{ $product->density }} kg</p>
                                <p class="card-text">RefractiveIndex : {{ $product->refractive_index }}</p>
                                <p class="card-text">Measurement : {{ $product->measurement }}</p>
                                <p class="card-text">Cut & Shape : {{ $product->cut_shape }}</p>
                                <p class="card-text">Color : {{ $product->color }}</p>
                                <p class="card-text">Text Conclusion : {{ $product->text_conclusion }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
