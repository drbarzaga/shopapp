@extends('fronted.layout.master')
@section('css')
  <link href="{{asset('fronted/fancybox/jquery.fancybox_item.css')}}" rel="stylesheet">
@endsection
@section('content')

  <div id="product-pop-up" style="display: none; width: 700px;">
    <div class="product-page product-pop-up">
      <div class="col-md-6 col-sm-6 col-xs-3">
        <div class="product-main-image" v-if="active.photos">
          <img :src="'{{asset('uploads/Product/medium')}}/'+active.photos[activeImage].photo" class="img-responsive">
        </div>
        <div class="product-other-images">
          <a v-on:click="activeImage=index" v-for="(image,index) in active.photos"
             :class="{'active':index==activeImage}" href="javascript:;"><img
              :src="'{{asset('uploads/Product/thumbnail')}}/'+image.photo"></a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-9">
        <h2>@{{ active.title }}</h2>
        <div class="price-availability-block clearfix">
          <div class="price">
            <strong><span>$</span>@{{ active.price }}</strong>
          </div>
        </div>
        <div v-for="field in fields" class="product-page-options">
          <div class="pull-left">
            <label class="control-label">@{{ field.field }}:</label>
            <div v-if="active.fields">
              @{{ active.fields[field.id] }}
            </div>
          </div>
        </div>
        <div class="product-page-cart">
          <div class="product-quantity">
            <input id="product-quantity" type="text" value="1" readonly name="product-quantity"
                   class="form-control input-sm">
          </div>
          <a href="javascript:;" class="btn btn-success">Añadir al carro</a>
          <a :href="productURL(active.id)" class="btn btn-primary">Ir al producto</a>
        </div>
      </div>
      <div class="sticker sticker-sale"></div>
    </div>
  </div>

  <div class="col-md-12">
    <ul class="breadcrumb">
      <li><a href="{{route('f_index')}}">Inicio</a></li>
      <li v-for="(bread,index) in breads"><a :href="index<breads.length-1?categoryURL(bread.id):'javascript:;'"
                                             :class="{active:index==breads.length-1}">@{{ bread.title }}</a></li>
    </ul>
  </div>
  <div class="row" id="categoryContent">
    <div class="col-md-3">
      <div v-if="subCategory.length" class="default-page">
        <div class="widget-categories">
          <ul>
            <li v-for="category in subCategory">
              <a :href="categoryURL(category.id)">@{{category.title}}</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="default-page">
        <h5 class="section-title">Precio ($@{{ PriceValue.min }} - $@{{ PriceValue.max }})</h5>
        <div id="slider-range" class="slider bg-blue">

        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div v-if="productList.length">
        <div v-for="(product,index) in productList" class="product col-md-3 col-sm-3">
          <div class="team-member">
            <img :src="'{{asset('uploads/Product/thumbnail')}}/'+product.photos[0].photo" class="img-responsive"
                 alt="">
            <div class="team-details">
              <h4><a :href="productURL(product.id)" style="color:#ffffff!important;">@{{ product.title }}</a></h4>
              <h5>$ @{{ product.price }}</h5>
              <ul>
                <li><a href="#product-pop-up" v-tip-bottom v-on:click="activeProduct(index)" title="Vista rápida"
                       class="fancybox-fast-view"><i class="fa fa-eye"></i></a></li>
                <li><a href="javascript:;" v-tip-bottom title="Adicionar al carrito"><i class="fa fa-shopping-cart"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="default-page alert-danger">
        <strong>No hay productos para mostrar en esta categoría</strong>
      </div>
    </div>
  </div>

  <input type="hidden" id="categoryId" value="{{$category}}">
@endsection

@section('js')
  <script src="{{asset('fronted/fancybox/jquery.fancybox.pack.js')}}"></script>
  <script src="{{asset('fronted/scripts/category.js')}}"></script>
  <script>
    $("#categoryMenu").addClass("active");
    $("#product-quantity").TouchSpin({
      verticalbuttons: true
    });
  </script>
@endsection