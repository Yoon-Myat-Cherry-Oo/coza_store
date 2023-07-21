@extends('layouts.admin_master')
@section('content')
<div class="container-fluid">
    <div class="row px-5">

        <div class="card shadow mt-3 col-lg-12 col-md-12 col-sm-12">
            <div class="card-header text-center fs1 bolder">
                <h3>Add Color</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.color.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="form-group col-lg-4 col-md-6 col-sm-12">
                            <label for="colorName">Color Name</label>
                            <input type="text" name="colorName" value="{{ old('colorName') }}" class="form-control" id="colorName">
                            @if($errors->has('colorName'))
                              <p class='text-danger'>{{ $errors->first('colorName') }}</p>
                              @endif
                        </div>
                        <div class="row">
                            {{-- <div class="form-group col-lg-4 col-md-6 col-sm-12">
                            <button type="submit" class="btn btn-sm bg-success my-3 fw-bolder">Add</button>
                            </div> --}}

                            <div class="form-group offset-6 col-lg-4 col-md-6 col-sm-12 float-end">
                                <button type="submit" class="btn btn-sm btn-secondary px-3 my-3 fw-bolder">Add</button>

                            <a class="btn btn-sm btn-secondary my-3 fw-bolder" type="button" href="{{ route('admin.color.index') }}">Cancel</a>
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
