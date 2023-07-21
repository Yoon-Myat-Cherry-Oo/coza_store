@extends('layouts.admin_master')
@section('content')
<div class="container-fluid">
    @php
        $category = App\Models\Category ::get();
        $subCategory = App\Models\Product::get();
        $color=App\Models\Color::get();
        $size=App\Models\Size::get();
    @endphp
    <div class="row px-5">

        <div class="card shadow mt-3 col-lg-12 col-md-12 col-sm-12">
            <div class="card-header text-center fs1 bolder">
                <h3>Add Product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="productName">Name</label>
                            <input type="text" name="productName" value="{{ old('productName') }}" class="form-control" id="productName">

                              @if($errors->has('productName'))
                              <p class='text-danger'>{{ $errors->first('productName') }}</p>
                              @endif
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="category">Category</label>
                            <select name="category" class="form-control">
                                <option value="">Choose Category Name</option>
                                @foreach ($category as $item )
                                <option value="{{ $item ->id }}">{{ $item->name }}</option>

                                @endforeach
                              </select>
                              @if($errors->has('category'))
                              <p class='text-danger'>{{ $errors->first('category') }}</p>
                              @endif
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="color">Color</label>
                            <select name="color" class="form-control">
                                <option value="">Choose Color</option>
                                @foreach ($color as $item )
                                <option value="{{ $item ->id }}">{{ $item->name }}</option>

                                @endforeach
                              </select>
                              @if($errors->has('color'))
                              <p class='text-danger'>{{ $errors->first('color') }}</p>
                              @endif
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="size">Size</label>
                            <select name="size" class="form-control">
                                <option value="">Choose Size</option>
                                @foreach ($size as $item )
                                <option value="{{ $item ->id }}">{{ $item->name }}</option>

                                @endforeach
                              </select>
                              @if($errors->has('size'))
                              <p class='text-danger'>{{ $errors->first('size') }}</p>
                              @endif
                        </div>
                    </div>



                    <div class="row pt-3">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="price">Price</label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price">

                                  @if($errors->has('price'))
                                  <p class='text-danger'>{{ $errors->first('price') }}</p>
                                  @endif
                        </div>


                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="qty">Quantity</label>
                            <input type="text" name="qty" value="{{ old('qty') }}" class="form-control" id="qty">
                              @if($errors->has('qty'))
                              <p class='text-danger'>{{ $errors->first('qty') }}</p>
                              @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="image">Photo</label>
                            <input type="file" name="image" value="{{ old('image') }}" class="form-control" id="image">

                              @if($errors->has('image'))
                              <p class='text-danger'>{{ $errors->first('image') }}</p>
                              @endif
                        </div>

                        <div class="form-group  col-lg-6 col-md-6 col-sm-12">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="description">
                              @if($errors->has('description'))
                              <p class='text-danger'>{{ $errors->first('description') }}</p>
                              @endif
                        </div>
                    </div>



                    <div class="row pt-2">
                        <div class="form-group offset-10 col-lg-2 col-md-6 col-sm-12">
                        <button type="submit" class="btn btn-sm btn-secondary my-3 fw-bolder px-3">Add</button>

                        <a class="btn btn-sm btn-secondary my-3 fw-bolder" type="button" href="{{ route('admin.product.index') }}">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>

        </div>
           <!--col end -->

    </div>
    <!--row end -->
</div>
<!--container-fluid end-->
@endsection
