@extends('backend.layout.base')

@section('breadcrumb')
  <a href="javascript:;" :class="{ current: breads.length==0 }" v-on:click="getData()">Categorias</a>
  <a v-for="(bread,index) in breads" :class="{ current: index==breads.length-1 }" v-on:click="getCategory(bread.id)" href="javascript:;"  >@{{ bread.title  }}</a>
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('backend/css/select2.css')}}"/>
@endsection
@section('content')
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
              <input name="title" id="title" type="text">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Padre</label>
            <div class="controls">
              <select id="parent">
                <option value="-1">Seleccione</option>
                <option v-for="category in allCategories" :value="category.id">@{{ category.title }}</option>
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
              <input accept="image/*" id="inputFoto" @change="onFileChange" class="hide" type="file" />
            </div>
          </div>
          <input type="hidden" id="urlCreate" value="{{route('api_category_create')}}">
        </form>

      </div>
      <div class="modal-footer">
        <a id="addCategoryBtn" class="btn btn-primary" href="javascript:;">Adicionar</a>
        <a data-dismiss="modal" class="btn" href="#">Cancelar</a></div>
    </div>
    <div class="widget-box">
      <div class="widget-title"><span class="icon"><i class="icon-list-alt"></i></span>
        <h5>Categorias</h5>
        <a class="btn tip-bottom" title="Eliminar seleccionados"><i style="color:#DA4F49" class="icon icon-remove"></i></a>
        <a class="btn tip-bottom" href="#addCategory" data-toggle="modal" title="Adicionar"><i
          style="color:#5BB75B"  class="icon icon-plus"></i></a>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
          <tr>
            <th width="4%"><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>
            <th>Foto</th>
            <th>Titulo</th>
            <th width="13%">Acciones</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="category in categories">
            <th><input type="checkbox"></th>
            <td>@{{ category.photo }}</td>
            <td>@{{ category.title }}</td>
            <td>
              <a :class="{ hide: category.get_childrens==0 }" v-on:click="getCategory(category.id)" class="btn" v-tip-bottom title="Mostrar"><i style="color:#000000" class="icon icon-eye-open"></i></a>
              <a class="btn" v-tip-bottom title="Editar"><i style="color:#49AFCD" class="icon icon-edit"></i></a>
              <a class="btn" v-tip-bottom title="Eliminar"><i style="color:#DA4F49" class="icon icon-remove"></i></a>
            </td>
          </tr>
          </tbody>
        </table>
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