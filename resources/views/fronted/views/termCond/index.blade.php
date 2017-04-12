@extends('fronted.layout.master')

@section('content')
  <div class="default-page">
  {!! $content !!}
  </div>
@endsection

@section('js')
  <script>
    $("#termCond").addClass("active");
  </script>
@endsection