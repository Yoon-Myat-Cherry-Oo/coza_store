@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row px-5">

        <div class="card shadow mt-3 col-lg-12 col-md-12 col-sm-12 ">
            <div class="card-header text-center fs1 bolder">
                Edit Doctor
            </div>
            <div class="card-body">
                <div class="">
                    <img class="img-thumbnail rounded-circle text-center  mx-auto d-block"
                    src="{{ asset('admin/doctor/'.$doctors->photo) }}" style="width:150px;height:150px">
                </div>
                <form action="{{ route('updateDoctor',$doctors->doctor_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="doctorName">Doctor Name</label>
                            <input type="text" name="doctorName" value="{{ old('doctorName',$doctors->name) }}" class="form-control" id="doctorName">
                            @if($errors->has('doctorName'))
                              <p class='text-danger'>{{ $errors->first('doctorName') }}</p>
                              @endif
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="doctorPhone">Phone</label>
                            <input type="text" name="doctorPhone" value="{{ old('doctorPhone',$doctors->phone) }}" class="form-control" id="doctorPhone">
                            @if($errors->has('doctorPhone'))
                              <p class='text-danger'>{{ $errors->first('doctorPhone') }}</p>
                              @endif
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="department">Department</label>
                            <select name="department" class="form-control">
                                <option value="empty">Please Select</option>
                                @if($doctors->department == 1)
                                <option value="1" selected>General Health</option>
                                <option value="2">Cardiology</option>
                                <option value="3">Dental</option>
                                <option value="4">Orthopaedics</option>
                                <option value="5">Obsteetrics & Gynaecology</option>
                                  <option value="6">Oncology</option>
                                  <option value="7">Paediatrics</option>
                                  <option value="8">Hepatobiliary</option>
                                  <option value="9">Anaethesiology</option>
                                  <option value="10">Surgery</option>
                                  <option value="11">Mental Health</option>
                                  <option value="12">Ear, Eye & Throat</option>
                                @elseif ($doctors->department == 2)
                                <option value="1" >General Health</option>
                                <option value="2" selected>Cardiology</option>
                                <option value="3">Dental</option>
                                <option value="4">Orthopaedics</option>
                                <option value="5">Obsteetrics & Gynaecology</option>
                                  <option value="6">Oncology</option>
                                  <option value="7">Paediatrics</option>
                                  <option value="8">Hepatobiliary</option>
                                  <option value="9">Anaethesiology</option>
                                  <option value="10">Surgery</option>
                                  <option value="11">Mental Health</option>
                                  <option value="12">Ear, Eye & Throat</option>
                                @elseif ($doctors->department == 3)
                                <option value="1" >General Health</option>
                                <option value="2">Cardiology</option>
                                <option value="3" selected>Dental</option>
                                <option value="4">Orthopaedics</option>
                                <option value="5">Obsteetrics & Gynaecology</option>
                                  <option value="6">Oncology</option>
                                  <option value="7">Paediatrics</option>
                                  <option value="8">Hepatobiliary</option>
                                  <option value="9">Anaethesiology</option>
                                  <option value="10">Surgery</option>
                                  <option value="11">Mental Health</option>
                                  <option value="12">Ear, Eye & Throat</option>
                                  @elseif ($doctors->department == 4)
                                  <option value="1" >General Health</option>
                                  <option value="2">Cardiology</option>
                                  <option value="3">Dental</option>
                                  <option value="4" selected>Orthopaedics</option>
                                  <option value="5">Obsteetrics & Gynaecology</option>
                                    <option value="6">Oncology</option>
                                    <option value="7">Paediatrics</option>
                                    <option value="8">Hepatobiliary</option>
                                    <option value="9">Anaethesiology</option>
                                    <option value="10">Surgery</option>
                                    <option value="11">Mental Health</option>
                                    <option value="12">Ear, Eye & Throat</option>
                                    @elseif ($doctors->department == 5)
                                    <option value="1" >General Health</option>
                                    <option value="2">Cardiology</option>
                                    <option value="3">Dental</option>
                                    <option value="4">Orthopaedics</option>
                                    <option value="5" selected>Obsteetrics & Gynaecology</option>
                                      <option value="6">Oncology</option>
                                      <option value="7">Paediatrics</option>
                                      <option value="8">Hepatobiliary</option>
                                      <option value="9">Anaethesiology</option>
                                      <option value="10">Surgery</option>
                                      <option value="11">Mental Health</option>
                                      <option value="12">Ear, Eye & Throat</option>
                                      @elseif ($doctors->department == 6)
                                      <option value="1" >General Health</option>
                                      <option value="2">Cardiology</option>
                                      <option value="3">Dental</option>
                                      <option value="4">Orthopaedics</option>
                                      <option value="5">Obsteetrics & Gynaecology</option>
                                        <option value="6" selected>Oncology</option>
                                        <option value="7">Paediatrics</option>
                                        <option value="8">Hepatobiliary</option>
                                        <option value="9">Anaethesiology</option>
                                        <option value="10">Surgery</option>
                                        <option value="11">Mental Health</option>
                                        <option value="12">Ear, Eye & Throat</option>
                                        @elseif ($doctors->department == 7)
                                        <option value="1" >General Health</option>
                                        <option value="2">Cardiology</option>
                                        <option value="3">Dental</option>
                                        <option value="4">Orthopaedics</option>
                                        <option value="5">Obsteetrics & Gynaecology</option>
                                          <option value="6">Oncology</option>
                                          <option value="7" selected>Paediatrics</option>
                                          <option value="8">Hepatobiliary</option>
                                          <option value="9">Anaethesiology</option>
                                          <option value="10">Surgery</option>
                                          <option value="11">Mental Health</option>
                                          <option value="12">Ear, Eye & Throat</option>
                                          @elseif ($doctors->department == 8)
                                          <option value="1" >General Health</option>
                                          <option value="2">Cardiology</option>
                                          <option value="3">Dental</option>
                                          <option value="4">Orthopaedics</option>
                                          <option value="5">Obsteetrics & Gynaecology</option>
                                            <option value="6">Oncology</option>
                                            <option value="7">Paediatrics</option>
                                            <option value="8" selected>Hepatobiliary</option>
                                            <option value="9">Anaethesiology</option>
                                            <option value="10">Surgery</option>
                                            <option value="11">Mental Health</option>
                                            <option value="12">Ear, Eye & Throat</option>
                                            @elseif ($doctors->department == 9)
                                            <option value="1" >General Health</option>
                                            <option value="2">Cardiology</option>
                                            <option value="3">Dental</option>
                                            <option value="4">Orthopaedics</option>
                                            <option value="5">Obsteetrics & Gynaecology</option>
                                              <option value="6">Oncology</option>
                                              <option value="7">Paediatrics</option>
                                              <option value="8">Hepatobiliary</option>
                                              <option value="9" selected>Anaethesiology</option>
                                              <option value="10">Surgery</option>
                                              <option value="11">Mental Health</option>
                                              <option value="12">Ear, Eye & Throat</option>
                                              @elseif ($doctors->department == 10)
                                              <option value="1" >General Health</option>
                                              <option value="2">Cardiology</option>
                                              <option value="3">Dental</option>
                                              <option value="4">Orthopaedics</option>
                                              <option value="5">Obsteetrics & Gynaecology</option>
                                                <option value="6">Oncology</option>
                                                <option value="7">Paediatrics</option>
                                                <option value="8">Hepatobiliary</option>
                                                <option value="9">Anaethesiology</option>
                                                <option value="10" selected>Surgery</option>
                                                <option value="11">Mental Health</option>
                                                <option value="12">Ear, Eye & Throat</option>
                                                @elseif ($doctors->department == 11)
                                                <option value="1" >General Health</option>
                                                <option value="2">Cardiology</option>
                                                <option value="3">Dental</option>
                                                <option value="4">Orthopaedics</option>
                                                <option value="5">Obsteetrics & Gynaecology</option>
                                                  <option value="6">Oncology</option>
                                                  <option value="7">Paediatrics</option>
                                                  <option value="8">Hepatobiliary</option>
                                                  <option value="9">Anaethesiology</option>
                                                  <option value="10">Surgery</option>
                                                  <option value="11" selected>Mental Health</option>
                                                  <option value="12">Ear, Eye & Throat</option>
                                                  @elseif ($doctors->department == 12)
                                                  <option value="1" >General Health</option>
                                                  <option value="2">Cardiology</option>
                                                  <option value="3">Dental</option>
                                                  <option value="4">Orthopaedics</option>
                                                  <option value="5">Obsteetrics & Gynaecology</option>
                                                    <option value="6">Oncology</option>
                                                    <option value="7">Paediatrics</option>
                                                    <option value="8">Hepatobiliary</option>
                                                    <option value="9">Anaethesiology</option>
                                                    <option value="10">Surgery</option>
                                                    <option value="11">Mental Health</option>
                                                    <option value="12" selected>Ear, Eye & Throat</option>
                                                @endif




                            </select>


                            @if($errors->has('department'))
                              <p class='text-danger'>{{ $errors->first('department') }}</p>
                              @endif
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label fro="doctorAge">Age</label>
                            <input type="text" name="doctorAge" value="{{ old('doctorPhone',$doctors->age) }}" class="form-control" id="doctorAge">
                            @if($errors->has('doctorAge'))
                              <p class='text-danger'>{{ $errors->first('doctorAge') }}</p>
                              @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="doctorQua">Qualification</label>
                            <input type="text" name="doctorQua" value="{{ old('doctorQua',$doctors->qualification) }}" class="form-control" id="doctorQua">
                            @if($errors->has('doctorQua'))
                              <p class='text-danger'>{{ $errors->first('doctorQua') }}</p>
                              @endif
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="empty" disabled>Please Select</option>
                                @if($doctors->gender == 1)
                                <option value="1" selected>Male</option>
                                <option value="2">Female</option>

                                @elseif ($doctors->gender == 2)
                                <option value="1">Male</option>
                                <option value="2" selected>Female</option>
                                @endif
                            </select>

                            @if($errors->has('gender'))
                              <p class='text-danger'>{{ $errors->first('gender') }}</p>
                              @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="doctorPhoto">Photo</label>
                            <input type="file" name="doctorPhoto" value="" class="form-control" id="doctorPhoto">
                            @if($errors->has('doctorPhoto'))
                              <p class='text-danger'>{{ $errors->first('doctorPhoto') }}</p>
                              @endif
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="duty">Duty Time</label>
                            <input type="string" name="duty" value="{{ old('duty',$doctors->duty) }}" class="form-control" id="duty">
                            @if($errors->has('duty'))
                              <p class='text-danger'>{{ $errors->first('duty') }}</p>
                              @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6 col-sm-12">
                        <button type="submit" class="btn btn-sm bg-success my-3 fw-bolder">Update</button>
                        </div>

                        <div class="form-group col-lg-4 col-md-6 col-sm-12">
                        <a class="btn btn-sm bg-primary my-3 fw-bolder" type="button" href="{{ route('doctorList') }}">Cancel</a>
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
