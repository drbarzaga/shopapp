@extends('backend.layout.base')

@section('breadcrumb')
  <a href="javascript:;" class="current">Campos de usuarios</a>
@endsection

@section('content')
  <div id="addField" class="modal hide" data-keyboard="false" data-backdrop="static">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Adicionar campo</h3>
    </div>
    <div class="modal-body">
      <form enctype="multipart/form-data" class="form-horizontal" id="fieldForm">
        <div class="control-group">
          <label class="control-label">Campo</label>
          <div class="controls">
            <input name="title" id="title" type="text">
          </div>
        </div>
        <input type="hidden" id="urlCreate" value="{{route('api_user_field_create')}}">
      </form>

    </div>
    <div class="modal-footer">
      <a id="addFieldBtn" class="btn btn-primary" href="javascript:;">Adicionar</a>
      <a data-dismiss="modal" class="btn" href="#">Cancelar</a></div>
  </div>

  <div class="widget-box">
    <div class="widget-title"><span class="icon"><i class="icon-list-alt"></i></span>
      <h5>Campos de productos</h5>
      <a class="btn tip-bottom" title="Eliminar seleccionados"><i style="color:#DA4F49" class="icon icon-remove"></i></a>
      <a class="btn tip-bottom" href="#addField" data-toggle="modal" title="Adicionar"><i
          style="color:#5BB75B"  class="icon icon-plus"></i></a>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered data-table">
        <thead>
        <tr>
          <th width="4%"><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>
          <th>Campo</th>
          <th width="13%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <th><input type="checkbox"></th>
          <td>Usuario</td>
          <td>
          </td>
        </tr>
        <tr>
          <th><input type="checkbox"></th>
          <td>Correo</td>
          <td>
          </td>
        </tr>
        <tr>
          <th><input type="checkbox"></th>
          <td>Rol</td>
          <td>
          </td>
        </tr>
        <tr v-for="field in fields">
          <th><input type="checkbox"></th>
          <td>@{{ field.field }}</td>
          <td>
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
  <script src="{{asset('backend/js/jquery.validate.js')}}"></script>
  <script src="{{asset('backend/scripts/userField.js')}}"></script>
  <script>
    $("#menu_config").addClass("active");
    $("#submenu_field_product").addClass("active");
  </script>
@endsection