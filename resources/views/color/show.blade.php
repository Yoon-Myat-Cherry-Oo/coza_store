@extends('layouts.admin_master')
@section('content')
<div class="container-fluid">
    <div class="row">

           <div class="col-8 offset-2 card shadow mt-3">
            <div class="card-header text-center fs1 font-bolder">
               <h3> Color Details</h3>
            </div>
            <div class="card-body">

                <div class="text-center">
                    <div class="my-2 py-2">
                        Name : {{ $color->name }}
                    </div>


                <div class="form-group col-lg-4 col-md-6 col-sm-12 float-end">
                    <a class="btn btn-sm btn-secondary my-3 fw-bolder" type="button" href="{{ route('admin.color.index') }}">Back</a>
                </div>


            </div>

           </div>
         </div>
    </div>
    @endsection









