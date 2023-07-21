@extends('layouts.admin_master')
@section('content')
<div class="container-fluid">
    <div class="row px-5">

        <div class="card shadow mt-3 col-lg-12 col-md-12 col-sm-12 ">
            <div class="card-header text-center fs1 bolder">
                <h3>Edit Category</h3>
            </div>
            <div class="card-body">
                {{-- <div class="">
                    <img class="img-thumbnail rounded-circle text-center  mx-auto d-block"
                    src="{{ asset('admin/doctor/'.$doctors->photo) }}" style="width:150px;height:150px">
                </div> --}}
                <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row d-flex justify-content-center">
                        <div class="form-group col-lg-4 col-md-6 col-sm-12">
                            <label for="doctorName">Category Name</label>
                            <input type="text" name="categoryName" value="{{ old('categoryName',$category->name) }}" class="form-control" id="categoryName">
                            @if($errors->has('categoryName'))
                              <p class='text-danger'>{{ $errors->first('categoryName') }}</p>
                              @endif
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group offset-6 col-lg-4 col-md-6 col-sm-12 float-end">
                        <button type="submit" class="btn btn-sm btn-secondary my-3 fw-bolder">Update</button>
                        <a class="btn btn-sm btn-secondary my-3 fw-bolder" type="button" href="{{ route('admin.category.index') }}">Cancel</a>

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
