@extends('layouts.admin_master')
@section('content')
<div class="container-fluid">
    <div class="row">

           <div class="col-8 offset-2 card shadow mt-3">
            <div class="card-header text-center fs1 font-bolder">
               <h3> Product Details</h3>
            </div>
            <div class="card-body">

                <div class="text-center">
                    <div class="my-2 py-2 d-flex justify-content-center">
                    <img src="{{ asset('uploads/'.$product->image) }}" class="img-thumbnail" width="150px" height="50px">

                    </div>

                    <div class="my-2 py-2">
                        Product Name : {{ $product->name }}
                    </div>

                    <div class="my-2 py-2">
                        Category Name : {{ $product->Category->name }}
                    </div>

                    <div class="my-2 py-2">
                        Size : {{ $product->Size->name }}
                    </div>

                    <div class="my-2 py-2">
                        Color : {{ $product->Color->name }}
                    </div>

                    <div class="my-2 py-2">
                        Quantity : {{ $product->qty }}
                    </div>

                    <div class="my-2 py-2">
                        Price : {{ $product->price }}
                    </div>

                    <div class="my-2 py-2">
                        Description : {{ $product->description }}
                    </div>


                <div class="form-group col-lg-4 col-md-6 col-sm-12 float-end">
                    <a class="btn btn-sm btn-secondary my-3 fw-bolder" type="button" href="{{ route('admin.product.index') }}">Back</a>
                </div>


            </div>

           </div>
         </div>
    </div>
    @endsection









