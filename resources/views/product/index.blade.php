@extends('layouts.admin_master')
@section('content')
@section('style')
<style>
    #sub_category{
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
                <h2 class="font-bolder">Product List</h2>
                <div class="py-3">
                    <h3 class="card-title float-start "><a href="{{ route('admin.product.create') }}">
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
                         <th>Photo</th>
                         <th>Name</th>
                         <th>Category</th>
                         <th>Price</th>
                         <th>Color</th>
                         <th>Size</th>
                         <th>Quantity</th>
                         {{-- <th>Description</th> --}}

                         {{-- <th>Qualification</th> --}}
                         {{-- <th>Description</th> --}}

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
                     @foreach ($product as $products )
                     <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td> <img src="{{ asset('uploads/'.$products->image) }}" class="img-thumbnail rounded" width="50px" height="50px"></td>
                       <td>
                           {{ $products->name }}
                       </td>
                       <td>
                        {{ $products->Category->name }}
                    </td>


                       <td>{{ $products->price }}</td>
                       <td>{{ $products->Color->name}}</td>
                       <td>{{ $products->Size->name }}</td>
                       <td>{{ $products->qty }}</td>
                       {{-- <td>{{ $entries->description }}</td> --}}

                     <td>
                       <a href="{{ route('admin.product.show',$products->id) }}"><button class="btn btn-sm  text-black"><i class="menu-icon tf-icons bx bx-low-vision"></i></button></a>
                       <a href="{{ route('admin.product.edit',$products->id) }}"><button class="btn btn-sm  text-black"><i class="menu-icon tf-icons bx bx-edit"></i></button></a>
                       <form action="{{ route('admin.product.destroy',[$products->id,'page'=>request()->page]) }}" method="post" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm"
                        onclick="return confirm('Are you sure to delete {{$products->name}}')"><i class="menu-icon tf-icons bx bx-trash"></i></button>
                    </form>
                    </td>
                     </tr>
                     @endforeach
                     @endif
                    </tbody>

                </table>
                 <div>
                   {{ $product->links() }}
                 </div>
            </div>

        </div>
           <!--col end -->

    </div>
    <!--row end -->
</div>

@endsection
