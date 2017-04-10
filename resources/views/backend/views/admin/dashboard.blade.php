@extends('backend.layout.base')

@section('content')
  <div class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="javascript:;"> <i class="icon- fa fa-building"></i> <span class="label label-important">20</span> Locales </a> </li>
      <li class="bg_ly"> <a href="javascript:;"> <i class="icon- fa fa-sitemap "></i><span class="label label-success">101</span> Categorias </a> </li>
      <li class="bg_lo"> <a href="javascript:;"> <i class="icon-barcode"></i> <span class="label label-inverse">20</span>Productos</a> </li>
      <li class="bg_ls"> <a href="javascript:;"> <i class="icon-user"></i> <span class="label label-primary">20</span>Usuarios</a> </li>
      <li class="bg_lr"> <a href="javascript:;"> <i class="icon-tint"></i> <span class="label label-warning">20</span>Buttons</a> </li>
      <li class="bg_lg"> <a href="javascript:;"> <i class="icon-pencil"></i><span class="label label-info">20</span>Elements</a> </li>
    </ul>
  </div>

@endsection
@section('js')
  <script>
    $("#menu_inicio").addClass("active")
  </script>
@endsection