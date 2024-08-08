@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Create Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('products.index')}}">Back</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name<span class="text-danger">*</span></label>
                <input type="text" name="brand_name" class="form-control" value = "{{ old('brand_name') }}">
                @error('brand_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="mass">Mass<span class="text-danger">*</span></label>
                <input type="text" name="mass" class="form-control" value = "{{ old('mass') }}">
                @error('mass')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="desnity">Density<span class="text-danger">*</span></label>
                <input type="text" name="density" class="form-control" value = "{{ old('density') }}">
                @error('density')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="refractive_index">Refractive Index<span class="text-danger">*</span></label>
                <input type="text" name="refractive_index" class="form-control" value = "{{ old('refractive_index') }}">
                @error('refractive_index')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="measurent">Measurement<span class="text-danger">*</span></label>
                <input type="text" name="measurement" class="form-control" value = "{{ old('measurement') }}">
                @error('measurement')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="cut_shape">Cut & Shape<span class="text-danger">*</span></label>
                <input type="text" name="cut_shape" class="form-control" value = "{{ old('cut_shape') }}">
                @error('cut_shpae')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="color">Color<span class="text-danger">*</span></label>
                <input type="text" name="color" class="form-control" value = "{{ old('color') }}">
                @error('color')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="text_conclusion">Text Conclusion<span class="text-danger">*</span></label>
                <textarea name="text_conclusion" id="" class="form-control" cols="30" rows="10">{{old('text_conclusion')}}</textarea>
                @error('text_conclusion')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image<span class="text-danger">*</span></label><br>
                <input type="file" name="image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="qr_image">Qr Image<span class="text-danger">(optional)</span></label><br>
                <input type="file" name="qr_image">
            </div>
            <button class="btn btn-primary mt-3 mb-3">Create Product</button>
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection