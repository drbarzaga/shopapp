<!doctype html>
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]>
<html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
  <title>TITULO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta id="token" name="token" value="{{ csrf_token() }}">
@include('fronted.layout.css')
@yield('css')

<!-- Construction JS File -->


</head>

<body>
<!-- car section
================================================== -->

<div id="carShop">
  <div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
              class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Carro de compras</h4>
        </div>
        <div class="modal-body">
          <table  class="table table-responsive">
            <thead>
            <tr>
              <th width="10%">Foto</th>
              <th>Titulo</th>
              <th>Precio</th>
              <th width="20%">Cantidad</th>
              <th>Sub-Total</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(element,index) in car">
              <td><img class="img-responsive" :src="'{{asset('uploads/Product/thumbnail')}}/'+element.product.photos[0].photo"></td>
              <td>@{{ element.product.title }}</td>
              <td>@{{ element.product.price }}</td>
              <td>
                <input :id="'price'+index" type="text" v-touch-spin :value="element.cant" :data-default="element.cant" class="form-control item-price"/>
              </td>
              <td>@{{ element.product.price * element.cant }}</td>
              <td>
                <a href="javascript:;" :data-index="index" class="btn btn-success refreshProductCar" type="submit"><i class="fa fa-refresh"></i></a>
                <a href="javascript:;" :data-index="index" class="btn btn-danger removeProductCar" type="submit"><i class="fa fa-remove"></i></a>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" id="clearCar" class="btn btn-danger">Vaciar carro</button>
          <button type="button" class="btn btn-primary">Realizar compra</button>
        </div>
      </div>
    </div>
  </div>
  <div class="colors-switcher" style="text-align: center">
    <a id="show-panel" class="show-panel"><i class="fa fa-shopping-cart"></i></a>
    <table class="table table-responsive ">
      <tbody>
      <tr>
        <td>Sub-Total</td>
        <td>@{{ subTotal | round}}</td>
      </tr>
      <tr>
        <td>Impuesto</td>
        <td>@{{ subTotal*tax | round}}</td>
      </tr>
      <tr>
        <td>Total</td>
        <td>@{{ subTotal*tax + subTotal | round}}</td>
      </tr>
      </tbody>
    </table>
    <a data-toggle="modal" href="#carModal">ver carro</a> | <a href="javascript:;">realizar compra</a>
  </div>
</div>
<!-- car section End
================================================== -->
<div id="templateVue">
  <!-- Start Loader -->
  <div id="loader">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
  <!-- End Loader -->

  <div class="container">
    <div class="header-section">
      <div class="row">
        <div class="col-md-5 col-sm-5">
          <div class="logo-img">
            <a href="#"><img src="images/logo.png" class="img-responsive" alt=""></a>
          </div>
        </div>
        <div class="col-md-7 col-sm-7">
          <div class="top-info">
            <ul class="top-social">
              <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#" class="flickr"><i class="fa fa-flickr"></i></a></li>
              <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <div class="top-phone clearfix"><i class="fa fa-phone"></i>+880-6878756534</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Header Section -->

    <!-- End Header Section -->

    <!-- Start Navigation Section -->
    <div class="navigation">
      <div id="navbar" class="navbar navbar-default navbar-top">
        <div class="navbar-header">
          <!-- Stat Toggle Nav Link For Mobiles -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="navbar-collapse collapse" style="padding-left: 5px">
          <!-- Start Navigation List -->
          <ul class="nav navbar-nav">
            <li>
              <a id="home" href="{{route('f_index')}}">Inicio</a>
            </li>
            <li>
              <a id="categoryMenu" href="#">Categorias</a>
              <ul class="dropdown">
                <li v-for="category in categories" :id="'category'+category.id">
                  <a :href="categoryURL(category.id)">@{{ category.title }}</a>
                </li>
              </ul>
            </li>
            <li>
              <a id="quienesSomos" href="{{route('f_quienesSomos')}}">Quienes somos</a>
            </li>
            <li>
              <a id="contactenos" href="{{route('f_contactenos')}}">Contáctenos</a>
            </li>
            <li>
              <a id="termCond" href="{{route('f_term_cond')}}">Términos y condiciones</a>
            </li>

            @if (Auth::guest())
              <li>
                <a class="visible-xs visible-sm" href="{{ url('/login') }}">Autenticarce</a>
              </li>
            @else
              <li class="visible-xs visible-sm">
                <a href="blog.html">{{Auth::user()->username}}</a>
                <ul class="dropdown">
                  <li>
                    <a href="blog.html">Mi cuenta</a>
                  </li>
                  <li>
                    <a href="blog-single-post.html">Salir</a>
                  </li>
                </ul>
              </li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right visible-md visible-lg">
            @if (Auth::guest())
              <li>
                <a href="{{ url('/login') }}">Autenticarce</a>
              </li>
            @else
              <li class="visible-md visible-lg">
                <a href="blog.html">{{Auth::user()->username}}</a>
                <ul class="dropdown pull-left-nav">
                  <li>
                    <a href="blog.html">Mi cuenta</a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                      Salir
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            @endif
          </ul>
          <!-- End Navigation List -->
        </div>
      </div>

    </div>
    <!-- End Navigation Section -->

  @yield('content')
  <!-- Start Footer Section -->
    <div style="width: 100%">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-section">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="footer-address">
                  <h3>Address</h3>
                  <address>
                    <strong>Construction, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                  </address>

                  <address>
                    <strong>Phone :</strong> (123) 456-7890<br>
                    <strong>Mobile :</strong> (123) 456-7890<br>
                    <strong>E-mail :</strong> youremail@email.com
                  </address>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="footer-gallery">
                  <h3>Photo Gallery</h3>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="footer-link">
                  <h3>Important Link</h3>
                  <ul>
                    <li><a href="#"><i class="fa fa-chevron-circle-right"></i>At vero eos et accusamus et</a></li>
                    <li><a href="#"><i class="fa fa-chevron-circle-right"></i>Dignissimos ducimus qui blanditiis</a>
                    </li>
                    <li><a href="#"><i class="fa fa-chevron-circle-right"></i>Voluptatum deleniti atque</a></li>
                    <li><a href="#"><i class="fa fa-chevron-circle-right"></i>Occaecati cupiditate non provident</a>
                    </li>
                    <li><a href="#"><i class="fa fa-chevron-circle-right"></i>Similique sunt in</a></li>
                    <li><a href="#"><i class="fa fa-chevron-circle-right"></i>Et harum quidem rerum facilis</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="footer-social">
                  <h3>Get In Touch</h3>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                  <h3>Subscribe With Us</h3>
                  <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="E-mail">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                  </form>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
      <!-- End Footer Section -->

      <!-- Start Copyright Section -->
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-section">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="copy">&copy; Copyright 2014 || All Rights Reserved</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Copyright Section -->
  </div><!-- /.container -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
</div>
@include('fronted.layout.js')

@yield('js')
{{--<script src="{{asset('fronted/scripts/template.js')}}"></script>--}}
</body>
</html>