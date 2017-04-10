@extends('backend.layout.base')

@section('breadcrumb')
  <a href="javascript:;" class="current">Productos</a></div>
@endsection
@section('content')


@endsection

@section('js')
  <script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/scripts/product.js')}}"></script>
  <script>
    $("#menu_product").addClass("active");
  </script>
@endsection