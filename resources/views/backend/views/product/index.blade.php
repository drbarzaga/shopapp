@extends('backend.layout.base')

@section('breadcrumb')
  <a href="javascript:;" class="current">Productos</a>
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('backend/css/select2.css')}}"/>
  <link rel="stylesheet" href="{{asset('backend/css/jquery.bxslider.css')}}"/>
  <style>
    .bx-controls{
      display: none;
    }
    .bx-wrapper{
     margin-bottom: 0;
    }
  </style>
@endsection
@section('content')
  <div id="addProduct" class="modal hide" data-keyboard="false" data-backdrop="static">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">Producto</a></li>
        <li><a data-toggle="tab" href="#tab2">Fotos</a></li>
      </ul>
    </div>
    <div class="modal-body">
      <form enctype="multipart/form-data" class="form-horizontal" id="productForm">
        <div class="tab-content">
          <div id="tab1" class="tab-pane active">
            <div class="control-group">
              <label class="control-label">Titulo</label>
              <div class="controls">
                <input name="title" id="title" type="text">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Categoría</label>
              <div class="controls">
                <select name="category" id="category">
                  <option v-for="category in categories" :value="category.id">@{{ category.title }}</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Precio</label>
              <div class="controls">
                <input name="price" id="price" type="text">
              </div>
            </div>
            <div class="control-group" v-for="field in fields">
              <label class="control-label">@{{ field.field }}</label>
              <div class="controls">
                <input class="field" type="text" :data-id="field.id">
              </div>
            </div>
            <input type="hidden" id="urlCreate" value="{{route('api_product_create')}}">
          </div>
          <div id="tab2" class="tab-pane">
            <div class="widget-box">
              <div class="widget-title"><span class="icon"><i class="icon-list-alt"></i></span>
                <h5>Fotos</h5>
                <a class="btn tip-left" id="addFoto" title="Adicionar"><i
                    style="color:#5BB75B" class="icon icon-plus"></i></a>
              </div>
              <div class="widget-content nopadding">
                <div class="hide" id="fotoContainer">
                </div>
                <table class="table table-bordered data-table">
                  <thead>
                  <tr>
                    <th width="20%">Foto</th>
                    <th>Portada</th>
                    <th width="10%">Acciones</th>
                  </tr>
                  </thead>
                  <tbody id="fotoShows">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <a id="addProductBtn" class="btn btn-primary" href="javascript:;">Adicionar</a>
      <a data-dismiss="modal" class="btn" href="#">Cancelar</a></div>
  </div>
  <div class="widget-box">
    <div class="widget-title"><span class="icon"><i class="icon-list-alt"></i></span>
      <h5>Productos</h5>
      <a class="btn tip-bottom" title="Eliminar seleccionados"><i style="color:#DA4F49"
                                                                  class="icon icon-remove"></i></a>
      <a class="btn tip-bottom" href="#addProduct" data-toggle="modal" title="Adicionar"><i
          style="color:#5BB75B" class="icon icon-plus"></i></a>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered data-table">
        <thead>
        <tr>
          <th width="4%"><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>
          <th>Titulo</th>
          <th width="10%">Foto</th>
          <th>Precio</th>
          <th v-for="field in fields">@{{field.field}}</th>
          <th width="13%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="product in products">
          <th><input type="checkbox"></th>
          <td>@{{ product.title }}</td>
          <td>
            <ul class="bxslider hide">
              <li v-for="img in product.photos"><img class="img-responsive" :src="'{{asset('uploads/Product/thumbnail')}}/'+img.photo"/></li>
            </ul>
          </td>
          <td>@{{ product.price }}</td>
          <td v-for="field in fields">@{{ product.fields[field.id] }}</td>
          <td>
            <a class="btn" v-tip-bottom title="Mostrar"><i style="color:#000000" class="icon icon-eye-open"></i></a>
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
  <script src="{{asset('backend/js/jquery.bxslider.js')}}"></script>
  <script src="{{asset('backend/scripts/product.js')}}"></script>
  <script>
    $("#menu_product").addClass("active");
    $("select").select2();

  </script>
@endsection