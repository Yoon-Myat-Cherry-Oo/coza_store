@extends('layouts.master')
@section('content')
{{-- @section('style')
@endsection --}}
@section('style')
<style>
   #home{
    color:#6c7ae0;
    font-weight: bold;
   }
</style>
@endsection
<!-- Cart -->

@include('partials.cart')
<!-- Slider -->
@include('partials.slider')
<!-- Banner -->
@include('partials.banner')
<!-- Product -->
@include('partials.product')
<!-- Back to top -->
@include('partials.backToTop')
<!-- Modal1 -->
@include('partials.modal')
@endsection
