@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
{{-- <div class="content-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (Session::has('createSuccess'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('createSuccess') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif
        @if (Session::has('updateSuccess'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('updateSuccess') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            </button>
          </div>
        @endif
        @if (Session::has('deleteSuccess'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('deleteSuccess') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            </button>
          </div>
        @endif

        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                 <h3 class="card-title"><a href="{{ route('newDoctor') }}">
                    <button class="btn btn-sm bg-dark text-white"><i class="fas fa-plus"></i></button></a></h3>
                 <span class="fs-5 ml-4">Total- {{ $doctors->total() }}</span>
                 <div class="card-tools">
                     <form action="{{ route('doctor#search') }}" method="POST">
                        @csrf
                        <div class="input-group text-end">
                            <div class="form-outline">
                              <input id="search-input" type="search" id="form1" class="form-control" placeholder="Search" name="table_search"/>
                            </div>
                            <button id="search-button" type="submit" class="btn btn-primary">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                   </form>
                 </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Phone</th>
                      <th>Department</th>
                    </tr>
                  </thead>
                  <tbody>
                     @if($status == 0)
                     <tr>
                       <td colspan="7">
                        <small class="text-muted">There is no data</small>

                       </td>
                     </tr>
                     @else
                     @foreach ($doctors as $doctor )
                     <tr>
                       <td>{{ $doctor->doctor_id }}</td>
                       <td>{{ $doctor->name }}</td>
                       <td>
                       <img src="{{ asset('admin/doctor/'.$doctor->photo) }}" class="img-thumbnail" width="150px">
                     </td>
                     <td>{{ $doctor->phone }}</td>
                     <td>
                        @if($doctor->department == 1)General Hearth
                        @elseif($doctor->department == 2)Cardiology
                        @elseif($doctor->department ==3)Dental
                        @elseif($doctor->department == 4)Neurology
                        @elseif($doctor->department ==5)Orthopaedics
                        @endif

                     </td>
                     <td>
                       <a href="{{ route('doctor#info',$doctor->doctor_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-eye"></i></button></a>
                       <a href="{{ route('doctor#edit',$doctor->doctor_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-edit"></i></button></a>
                       <a href="{{ route('doctor#delete',$doctor->doctor_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                     </td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
                </table>
                <div>
                    {{ $doctors->links() }}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div> --}}
  <!-- /.content-wrapper -->
  {{-- <div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header mx-4">
              <div>
                @if (Session::has('createSuccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('createSuccess') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif
                @if (Session::has('updateSuccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('updateSuccess') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                  </div>
                @endif
                @if (Session::has('deleteSuccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('deleteSuccess') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                  </div>
                @endif

              </div>
              Doctor List
              <div class="row mt-3">
                <div class="col-lg-6 col-md-4 col-sm-12">
                    <h3 class="card-title">
                        <a href="{{ route('newDoctor') }}">
                            <button class="btn btn-sm bg-dark text-white">
                                <i class="fas fa-plus">
                                </i>
                            </button>
                        </a>
                        </h3>

                </div>

              {{-- <span class="fs-5 ml-4">Total- {{ $doctors->total() }}</span> --}}
                 {{-- <div class="col-lg-6 col-md-4 col-sm-12">
                    <div class="card-tools">
                        <form action="{{ route('doctor#search') }}" method="POST">
                       @csrf
                       <div class="input-group text-end">
                           <div class="form-outline">
                             <input id="search-input" type="search" id="form1" class="form-control" placeholder="Search" name="table_search"/>
                           </div>
                           <button id="search-button" type="submit" class="btn btn-primary">
                             <i class="fas fa-search"></i>
                           </button>
                         </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
            <div class="card-body"> --}}
               {{-- <div class="table-responsive"> --}}
                {{-- <table class="g-0 table table-responsive table-bordered table-striped table-hover">

                    <thead>
                     <tr>
                         <th>ID</th>
                         <th>Name</th>
                         <th>Photo</th>
                         <th>Phone</th>
                         <th>Department</th>
                     </tr>
                    </thead>
                    <tbody>
                     @if($status == 0)
                     <tr>
                       <td colspan="7">
                        <small class="text-muted">There is no data</small>

                       </td>
                     </tr>
                     @else
                     @foreach ($doctors as $doctor )
                     <tr>
                       <td>{{ $doctor->doctor_id }}</td>
                       <td>{{ $doctor->name }}</td>
                       <td>
                       <img src="{{ asset('admin/doctor/'.$doctor->photo) }}" class="img-thumbnail" width="150px">
                     </td>
                     <td>{{ $doctor->phone }}</td>
                     <td>
                        @if($doctor->department == 1)General Hearth
                        @elseif($doctor->department == 2)Cardiology
                        @elseif($doctor->department ==3)Dental
                        @elseif($doctor->department == 4)Neurology
                        @elseif($doctor->department ==5)Orthopaedics
                        @endif

                     </td>
                     <td>
                       <a href="{{ route('doctor#info',$doctor->doctor_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-eye"></i></button></a>
                       <a href="{{ route('doctor#edit',$doctor->doctor_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-edit"></i></button></a>
                       <a href="{{ route('doctor#delete',$doctor->doctor_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                     </td>
                     </tr>
                     @endforeach
                     @endif
                    </tbody>

                </table>
                 <div>
                   {{ $doctors->links() }}
                 </div> --}}
               {{-- </div> --}}
            {{-- </div>
        </div>
    </div>
  </div> --}}


  <div class="container-fluid g-0 class1">
    <div class="row" id="row1" >

        <div class="card mt-3 col-lg-12 col-md-12 col-sm-12 class3 px-5" id="card1">
            <div class="card-header text-center fs1 bolder">
                <div>
                    @if (Session::has('createSuccess'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('createSuccess') }}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @endif
                    @if (Session::has('updateSuccess'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('updateSuccess') }}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        </button>
                      </div>
                    @endif
                    @if (Session::has('deleteSuccess'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('deleteSuccess') }}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        </button>
                      </div>
                    @endif
                </div>
                <h1 class="font-bolder">Doctor List</h1>
                <div class="py-3">
                    <h3 class="card-title float-start "><a href="{{ route('newDoctor') }}">
                    <button class="btn btn-sm bg-dark text-white"><i class="fas fa-plus"></i></button></a></h3>
                    <div class="card-tools float-end">
                        <form action="{{ route('searchDoctor') }}" method="POST">
                           @csrf
                           <div class="input-group text-end">
                               <div class="form-outline">
                                 <input id="search-input" type="search" id="form1" class="form-control" placeholder="Search by name" name="table_search"/>
                               </div>
                               <button id="search-button" type="submit" class="btn btn-sm btn-primary">
                                 <i class="fas fa-search"></i>
                               </button>
                             </div>
                      </form>
                    </div>
                </div>
            </div>
            <div class="card-body" id="cardBody" style="
                    -webkit-box-flex: 1;
                    -ms-flex: 0 0 0;
                    flex: 1 1 auto;
                    padding: 0rem 0rem;
               ">
                <table class="g-0 table table-responsive table-bordered table-striped table-hover">

                    <thead>
                     <tr>
                         <th>No</th>
                         <th>Name</th>
                         <th>Photo</th>
                         <th>Phone</th>
                         <th>Department</th>
                         {{-- <th>Qualification</th> --}}
                         <th></th>

                     </tr>
                    </thead>
                    <tbody>
                     @if($status == 0)
                     <tr>
                       <td colspan="7">
                        <small class="text-muted">There is no data</small>

                       </td>
                     </tr>
                     @else
                     @foreach ($doctors as $doctor )
                     <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $doctor->name }}</td>
                       <td>
                       <img src="{{ asset('admin/doctor/'.$doctor->photo) }}" class="img-thumbnail" width="150px">
                     </td>
                     <td>{{ $doctor->phone }}</td>
                     <td>
                        @if($doctor->department == 1)General Hearth
                        @elseif($doctor->department == 2)Cardiology
                        @elseif($doctor->department == 3)Dental
                        @elseif($doctor->department == 4)Orthopaedics
                        @elseif($doctor->department == 5)Obsteetrics & Gynaecology
                        @elseif($doctor->department == 6)Oncology
                        @elseif($doctor->department == 7)Paediatrics
                        @elseif($doctor->department == 8)Hepatobiliary
                        @elseif($doctor->department == 9)Anaethesiology
                        @elseif($doctor->department == 10)Surgery
                        @elseif($doctor->department == 11)Mental Health
                        @elseif($doctor->department == 12)Ear, Eye & Throat

                        @endif

                     </td>
                     {{-- <td>{{ $doctor->qualification }}</td> --}}
                     {{-- <td>
                        @if($doctor->gender == 1)Male
                        @elseif($doctor->gender == 2)Female

                        @endif

                     </td> --}}
                     <td>
                       <a href="{{ route('seeDoctor',$doctor->doctor_id) }}"><button class="btn btn-sm  text-black"><i class="fas fa-eye"></i></button></a>
                       <a href="{{ route('editDoctor',$doctor->doctor_id) }}"><button class="btn btn-sm  text-black"><i class="fas fa-edit"></i></button></a>
                       <a href="{{ route('deleteDoctor',$doctor->doctor_id) }}"><button class="btn btn-sm  text-black"><i class="fas fa-trash-alt"></i></button></a>
                     </td>
                     </tr>
                     @endforeach
                     @endif
                    </tbody>

                </table>
                 <div>
                   {{ $doctors->links() }}
                 </div>
            </div>

        </div>
           <!--col end -->

    </div>
    <!--row end -->
</div>


@endsection
