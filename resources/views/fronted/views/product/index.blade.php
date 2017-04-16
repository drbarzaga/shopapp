@extends('fronted.layout.master')
@section('css')
  <link href="{{asset('fronted/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
@endsection
@section('content')
  <div class="col-md-12">
    <ul class="breadcrumb">
      <li><a href="{{route('f_index')}}">Inicio</a></li>
      <li v-for="(bread,index) in breads"><a :href="index<breads.length-1?categoryURL(bread.id):'javascript:;'"
                                             :class="{active:index==breads.length-1}">@{{ bread.title }}</a></li>
    </ul>
  </div>

  <div class="row" id="categoryContent">
    <div class="col-md-5">
      <div class="default-page">
        <h2>@{{ product.title }}</h2>
        <div class="price-availability-block clearfix">
          <div class="price">
            <strong><span>$</span>@{{ product.price }}</strong>
          </div>
        </div>
        <div v-for="field in fields" class="product-page-options">
          <div class="pull-left">
            <label class="control-label">@{{ field.field }}:</label>
            <div v-if="product.fields">
              @{{ product.fields[field.id] }}
            </div>
          </div>
        </div>
        <div class="product-page-cart">
          <div class="product-quantity">
            <input id="product-quantity" type="text" value="1" readonly name="product-quantity"
                   class="form-control input-sm">
          </div>
          <button class="btn btn-success" type="submit">Añadir al carro</button>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <div class="default-page">
        <div class="row">
          <div v-for="photo in product.photos" class="col-md-4">
            <a data-fancybox="gallery"  data-beforeLoad="function(){console.log('asd')}" :href="'{{asset('uploads/Product/large')}}/'+photo.photo"><img :src="'{{asset('uploads/Product/thumbnail')}}/'+photo.photo"/></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" id="productId" value="{{$product}}">
@endsection

@section('js')
  <script src="{{asset('fronted/fancybox/jquery.fancybox.js')}}"></script>

  <script src="{{asset('fronted/scripts/product.js')}}"></script>
  <script>
    $("#categoryMenu").addClass("active");
    $("#product-quantity").TouchSpin({
      verticalbuttons: true
    });
  </script>
@endsection