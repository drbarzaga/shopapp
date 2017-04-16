@extends('fronted.layout.master')

@section('content')
  {{--Slider--}}
  <div id="dashboard">
  <div class="row">
    <div class="col-md-12">
      <div class="main-slider" id="main-slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="{{asset('fronted/images/slider/sl1.jpg')}}" class="img-responsive" alt="Slider images 1">
            </div>
            <div class="item">
              <img src="{{asset('fronted/images/slider/sl2.jpg')}}" class="img-responsive" alt="Slider images 2">
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
    </div>
  </div>
  {{--Slide end--}}
  {{--Locales--}}
  <div class="row">
    <div class="col-md-12">
      <div class="team-section">
        <h3 class="section-title">Nuestros locales</h3>
        <div class="tab-pane active" id="management">
          <div class="our-team" id="portfolio-list">
            <div class="portfolio-item">
              <img src="{{asset('fronted/images/locals/L1.jpg')}}" class="img-responsive" alt=""/>
              <div class="figure-caption">
                <h4>Local 1</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                  totam rem aperiam voluptatem accusantium.</p>
                <a href="#"><i class="fa fa-map-marker"></i> Donde estamos</a>
              </div>
            </div>
            <div class="portfolio-item">
              <img src="{{asset('fronted/images/locals/L2.jpg')}}" class="img-responsive" alt=""/>
              <div class="figure-caption">
                <h4>Local 2</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                  totam rem aperiam voluptatem accusantium.</p>
                <a href="#"><i class="fa fa-map-marker"></i> Donde estamos</a>
              </div>
            </div>
            <div class="portfolio-item">
              <img src="{{asset('fronted/images/locals/L3.jpg')}}" class="img-responsive" alt=""/>
              <div class="figure-caption">
                <h4>Local 3</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                  totam rem aperiam voluptatem accusantium.</p>
                <a href="#"><i class="fa fa-map-marker"></i> Donde estamos</a>
              </div>
            </div>
            <div class="portfolio-item">
              <img src="{{asset('fronted/images/locals/L4.jpg')}}" class="img-responsive" alt=""/>
              <div class="figure-caption">
                <h4>Local 4</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                  totam rem aperiam voluptatem accusantium.</p>
                <a href="#"><i class="fa fa-map-marker"></i> Donde estamos</a>
              </div>
            </div>
            <div class="portfolio-item">
              <img src="{{asset('fronted/images/locals/L5.jpg')}}" class="img-responsive" alt=""/>
              <div class="figure-caption">
                <h4>Local 5</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                  totam rem aperiam voluptatem accusantium.</p>
                <a href="#"><i class="fa fa-map-marker"></i> Donde estamos</a>
              </div>
            </div>
            <div class="portfolio-item">
              <img src="{{asset('fronted/images/locals/L6.jpg')}}" class="img-responsive" alt=""/>
              <div class="figure-caption">
                <h4>Local 6</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                  totam rem aperiam voluptatem accusantium.</p>
                <a href="#"><i class="fa fa-map-marker"></i> Donde estamos</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--Locales end--}}

  {{--Categorias & alertas--}}
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <div class="default-page">
        <div class="row">
          <div class="widget-categories col-md-6">
            <ul>
              <li v-for="(category,index) in categories">
                <a :href="categoryURL(category.id)" :class="{activeIndex:index==activeIndex}" v-on:mouseover="categoryOver(category.photo,index)">@{{category.title}}</a>
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <img class="img-responsive" :src="'{{asset('uploads/Category/small')}}/'+selectImg">
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6">
      <div class="default-page">
        <h3 class="section-title">Alertas</h3>
      </div>
    </div>
    <!--End sidebar-->

  </div>
  {{--Categorias & alertas end--}}
  </div>
@endsection

@section('js')
  <script src="{{asset('fronted/scripts/home.js')}}"></script>
  <script>
    $("#home").addClass("active");
  </script>
@endsection