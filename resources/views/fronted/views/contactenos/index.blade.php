@extends('fronted.layout.master')

@section('content')
  <div class="default-page">
  {!! $content !!}
  </div>
@endsection

@section('js')
  <script>
    $("#contactenos").addClass("active");
  </script>
@endsection