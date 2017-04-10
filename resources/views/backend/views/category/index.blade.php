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
          <th>Foto</th>
          <th>Titulo</th>
          <th width="10%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="category in categories">
          <td>@{{ category.photo }}</td>
          <td>@{{ category.title }}</td>
          <td>
            <a class="btn btn-info"><i class="icon icon-edit"></i></a>
            <a class="btn btn-danger tip-bottom" title="Eliminar"><i class="icon icon-remove"></i></a>
          </td>
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
    $("#menu_cat").addClass("active");

  </script>
@endsection