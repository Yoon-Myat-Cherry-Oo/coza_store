@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">

           <div class="col-8 offset-2 card shadow mt-3">
            <div class="card-header text-center fs1 font-bolder">
                Doctor Information Details
            </div>
            <div class="card-body">
                <div class="my-2 py-2">
                    <img class="img-thumbnail rounded-circle text-center  mx-auto d-block" src="{{ asset('admin/doctor/'.$doctors->photo) }}" style="width:150px;height:150px">
                </div>
                <div class="text-center">
                    <div class="my-2 py-2">
                        Name : {{ $doctors->name }}
                    </div>

                    <div class="my-2 py-2">
                         Phone : {{ $doctors->phone }}
                    </div>

                    <div class="my-2 py-2">
                        @if($doctors->department == 1)
                        Department: General Health
                        @elseif ($doctors->department == 2)
                        Department: Cardiology
                        @elseif ($doctors->department == 3)
                        Department: Dental
                        @elseif($doctors->department == 4)
                        Department: Orthopaedics
                        @elseif($doctors->department == 5)Department: Obsteetrics & Gynaecology
                        @elseif($doctors->department == 6)Department: Oncology
                        @elseif($doctors->department == 7)Department: Paediatrics
                        @elseif($doctors->department == 8)Department: Hepatobiliary
                        @elseif($doctors->department == 9)Department: Anaethesiology
                        @elseif($doctors->department == 10)Department: Surgery
                        @elseif($doctors->department == 11)Department: Mental Health
                        @elseif($doctors->department == 12)Department: Ear, Eye & Throat
                        @endif

                    </div>

                    <div class="my-2 py-2">
                        Qualifications : {{ $doctors->qualification }}
                    </div>

                    <div class="my-2 py-2">
                        Duty : {{ $doctors->duty }}
                    </div>


                    <div class="my-2 py-2">
                        Age : {{ $doctors->age }}
                    </div>

                    <div class="my-2 py-2">
                        @if($doctors->gender == 1)
                        Gender : Male
                        @elseif ($doctors->gender == 2)

                        Gender : Female
                        @endif
                    </div>

                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 float-end">
                    <a class="btn btn-sm bg-primary my-3 fw-bolder" type="button" href="{{ route('doctorList') }}">Back</a>
                </div>


            </div>

           </div>
         </div>
    </div>
    @endsection









