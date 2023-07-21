@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                 <h3 class="card-title"><a href="{{ route('newDoctor') }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-plus"></i></button></a></h3>
                 <div>
                    <span class="fs-5 ml-4">Total- {{$doctor->total()  }}</span>

                </div>
                <div class="card-tools">
                    <form action="{{ route('doctor#search') }}" method="POST">
                  <div class="input-group input-group-sm mt-1" style="width: 150px;">

                    @csrf
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                   </form>

                  </div>
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
                   @foreach ($doctor as $person )
                   <tr>
                    <td>{{ $person->doctor_id }}</td>
                    <td>{{ $person->name }}</td>
                    <td>
                      <img src="{{ asset('admin/doctor/'.$person->photo) }}" class="img-thumbnail" width="100px">
                    </td>
                    <td>{{ $person->phone }}</td>
                    <td>
                        @if($person->department == 1)Eye
                        @elseif($person->department == 2)Ear
                        @elseif($person->department ==3)Heart
                        @endif

                    </td>
                    <td>
                        <a href="{{ route('infoDoctor',$person->doctor_id) }}"><button class="btn btn-sm bg-blue text-white"><i class="fas fa-eye"></i></button></a>
                      <a href="{{ route('editDoctor',$person->doctor_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-edit"></i></button></a>
                      <a href="{{ route('deleteDoctor',$person->doctor_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>

                    </td>
                  </tr>
                   @endforeach
                @endif
                  </tbody>
                </table>
                <div>
                    {{ $doctor->links() }}
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
  </div>
  <!-- /.content-wrapper -->

@endsection
