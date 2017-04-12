@extends('backend.layout.base')

@section('breadcrumb')
  <a href="javascript:;" class="current">Categorias</a>
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('backend/css/select2.css')}}"/>
@endsection
@section('content')
  <div id="category-container">
    <div id="addCategory" class="modal hide" data-keyboard="false" data-backdrop="static">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Adicionar categoría</h3>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" class="form-horizontal" id="categoryForm">
          <div class="control-group">
            <label class="control-label">Titulo</label>
            <div class="controls">
              <input name="title" id="title" v-model="newCategory.title" type="text">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Padre</label>
            <div class="controls">
              <select v-model="newCategory.parent">
                <option value="-1">Seleccione</option>
                <option v-for="category in categories" :value="category.id">@{{ category.title }}</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Foto</label>
            <div class="controls">
              <div class="input-append" >
                <input disabled id="fotoText" name="fotoText" type="text">
                <a id="fotoBtn" href="javascript:;" class="add-on"><i class="icon icon-picture"></i></a>
              </div>
              <input id="inputFoto" name="foto" @change="onFileChange" type="file">
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <a id="addCategoryBtn" class="btn btn-primary" href="javascript:;">Adicionar</a>
        <a data-dismiss="modal" class="btn" href="#">Cancelar</a></div>
    </div>
    <div class="widget-box">
      <div class="widget-title"><span class="icon"><i class="icon-list-alt"></i></span>
        <h5>Categorias</h5>
        <a class="btn btn-danger tip-bottom" title="Eliminar seleccionados"><i class="icon icon-remove"></i></a>
        <a class="btn btn-success tip-bottom" href="#addCategory" data-toggle="modal" title="Adicionar"><i
            class="icon icon-plus"></i></a>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
          <tr>
            <th width="4%"><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>
            <th>Foto</th>
            <th>Titulo</th>
            <th width="10%">Acciones</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="category in categories">
            <th><input type="checkbox"></th>
            <td>@{{ category.photo }}</td>
            <td>@{{ category.title }}</td>
            <td>
              <a class="btn btn-info" v-tip-bottom title="Editar"><i class="icon icon-edit"></i></a>
              <a class="btn btn-danger" v-tip-bottom title="Eliminar"><i class="icon icon-remove"></i></a>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/js/select2.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.validate.js')}}"></script>
  <script src="{{asset('backend/scripts/category.js')}}"></script>
  <script>
    $("#menu_cat").addClass("active");
    $("select").select2();
  </script>
@endsection