@extends('backend.layout.base')

@section('breadcrumb')
  <a href="javascript:;" class="current">Categorias</a>
@endsection
@section('content')
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-list-alt"></i></span>
      <h5>Categorias</h5>
    </div>
    <div class="widget-content nopadding" id="category-container">
      <table class="table table-bordered data-table">
        <thead>
        <tr>
          <th>Titulo</th>
          <th>Foto</th>
          <th>Padre</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="category in categories">
          <td>@{{ category.title }}</td>
          <td>@{{ category.photo }}</td>
          <td><span v-if="category.parent">@{{ category.parent }}</span></td>
          <td></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>

@endsection

@section('js')
  <script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/scripts/category.js')}}"></script>
  <script>
    $("#menu_cat").addClass("active")
  </script>
@endsection