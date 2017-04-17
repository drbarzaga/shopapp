/**
 * Created by rafa on 10/04/2017.
 */
/**
 * Created by rafa on 10/04/2017.
 */
var category = new Vue({
  name: 'Category',
  el:'#templateVue',
  data:{
    categories:[],
    subCategory:[],
    products:[],
    productList:[],
    fields:[],
    selectImg:'',
    categoryTitle:'',
    breads:'',
    Price:10,
    PriceValue:{max:0,min:0},
    active:{},
    activeImage:0
  },
  watch: {
    Price: function () {
      category.productList=[];
      category.products.forEach(function(item){
        if(item.price>=category.PriceValue.min && item.price<=category.PriceValue.max){
          category.productList.push(item);
        }
      })
    }
  },
  methods: {
    getData:function(){
      var url=window.Shop.baseUrl+'/category/root';
      this.$http.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          this.categories=response.data.category;
          this.selectImg=response.data.category[0].photo;
        }
      });
      var url=window.Shop.baseUrl+'/product/field';
      this.$http.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          this.fields=response.data.field;
        }
      });
      var url=window.Shop.baseUrl+'/category/'+$("#categoryId").val();
      this.$http.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          this.subCategory=response.data.category.get_childrens;
          this.categoryTitle=response.data.category.title;
          this.breads=response.data.bread;
          $("#category"+this.breads[0].id).addClass("active");
          var product=response.data.category.products;
          var max=Math.max.apply(Math,product.map(function(o){return o.price;}));
          var min=Math.min.apply(Math,product.map(function(o){return o.price;}));
          if (!isFinite(max)){
            max=0;
            min=0;
          }
          this.PriceValue.max=max;
          this.PriceValue.min=min;
          $("#slider-range").slider({
            range: true,
            min: min,
            max: max,
            values: [min, max],
            slide: function (event, ui) {
              category.PriceValue.min=ui.values[0];
              category.PriceValue.max=ui.values[1];
              category.Price=ui.values[1]-ui.values[0];
            }
          });
          this.products=product;
          this.productList=product;
        }
      });
    },
    categoryURL:function(url){
      return window.baseURL+"/category/"+url;
    },
    productURL:function(url){
      return window.baseURL+"/product/"+url;
    },
    activeProduct:function(pos){
      this.active=category.productList[pos];
    }
  },
  mounted:function(){
    this.getData();
  }
});
$(".fancybox-fast-view").fancybox({
  afterShow: function(){
    $("html").getNiceScroll().remove();
    category.activeImage=0;
  },
  afterClose: function(){
    $("#product-quantity").val("1");
    $("html").niceScroll({
      scrollspeed: 100,
      mousescrollstep: 38,
      cursorwidth: 5,
      cursorborder: 0,
      cursorcolor: '#333',
      zindex: 999999999,
      horizrailenabled: false,
      cursorborderradius: 0
    });
  }
});


