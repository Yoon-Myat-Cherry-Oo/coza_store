@extends('layouts.admin_master')
@section('content')
@section('style')
<style>
    #color{
     color:blueviolet;
     font-weight: bold;

    }
 </style>
@endsection
<div class="container-fluid g-0 class1">
    <div class="row" id="row1" >

        <div class="card mt-3 col-lg-12 col-md-12 col-sm-12 class3 px-5" id="card1">
            <div class="card-header text-center fs1 bolder">
                <div>
                    @if (Session::has('createSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('deleteSuccess') }}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        </button>
                      </div>
                    @endif
                </div>
                <h3 class="font-bolder">Color List</h3>
                <div class="py-3">
                    <h3 class="card-title float-start "><a href="{{ route('admin.color.create') }}">
                    <button class="btn btn-sm bg-secondary text-white">
                        <i class="menu-icon tf-icons bx bx-plus text-center ps-2"></i>
                        {{-- <i class="fas fa-plus"></i> --}}
                    </button></a></h3>
                    {{-- <div class="card-tools float-end">
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
                    </div> --}}
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
                     @foreach ($color as $colors )
                     <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $colors->name }}</td>

                     <td>
                       <a href="{{ route('admin.color.show',$colors->id) }}"><button class="btn btn-sm  text-black"><i class="menu-icon tf-icons bx bx-low-vision"></i></button></a>
                       <a href="{{ route('admin.color.edit',$colors->id) }}"><button class="btn btn-sm  text-black"><i class="menu-icon tf-icons bx bx-edit"></i></button></a>
                       <form action="{{ route('admin.color.destroy',[$colors->id,'page'=>request()->page]) }}" method="post" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure to delete {{$colors->name}}')"><i class="menu-icon tf-icons bx bx-trash"></i></button>
                    </form>
                    </td>
                     </tr>
                     @endforeach
                     @endif
                    </tbody>

                </table>
                 <div>
                   {{ $color->links() }}
                 </div>
            </div>

        </div>
           <!--col end -->

    </div>
    <!--row end -->
</div>

@endsection
