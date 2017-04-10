<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  @include('backend.layout.css')
  @yield('css')

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="/admin">Administración</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                                                  data-target="#profile-messages" class="dropdown-toggle"><i
          class="icon icon-user"></i> <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages"
                                               class="dropdown-toggle"><i class="icon icon-envelope"></i> <span
          class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
    </li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li id="menu_inicio"><a href="/admin"><i class="icon icon-home"></i> <span>Inicio</span></a></li>
    <li id="menu_cat"><a href="/admin/category"><i class="icon icon-list-alt"></i> <span>Categorias</span></a></li>
    <li id="menu_product"><a href="/admin/product"><i class="icon icon-barcode"></i> <span>Productos</span></a></li>

    <li id="menu_config" class="submenu"><a href="#"><i class="icon icon-cog"></i> <span>Configurar</span></a>
      <ul>
        <li id="submenu_field_product"><a href="gallery.html">Campos de producto</a></li>
        <li id="submenu_field_product"><a href="gallery.html">Campos de pedido</a></li>
        <li id="submenu_field_user"><a href="gallery.html">Campos de usuario</a></li>
      </ul>
    </li>
    <li id="menu_locals"><a href="/admin/local"><i class="icon icon-list-alt"></i> <span>Locales</span></a></li>
    <li id="menu_pages" class="submenu"><a href="#"><i class="icon icon-file"></i> <span>Páginas</span></a>
      <ul>
        <li id="submenu_quienesS"><a href="gallery.html">Quienes somos</a></li>
        <li id="submenu_conctatc"><a href="gallery.html">Contáctenos</a></li>
        <li id="submenu_TrmyCon"><a href="gallery.html">Terminos y condiciones</a></li>
      </ul>
    </li>

  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="/admin">
        <i class="icon-home"></i> Inicio
      </a>
      @yield('breadcrumb')
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    @yield('content')
  </div>
</div>

@include('backend.layout.script')
@yield('js')

</body>
</html>
