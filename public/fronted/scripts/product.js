/**
 * Created by rafa on 10/04/2017.
 */
/**
 * Created by rafa on 10/04/2017.
 */
var product = new Vue({
  name: 'Product',
  el:'#templateVue',
  data:{
    categories:[],
    product:{},
    breads:[],
    fields:[]
  },
  methods: {
    getData:function(){
      var url=window.Shop.baseUrl+'/category/root';
      axios.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          product.categories=response.data.category;
        }
      });
      var url=window.Shop.baseUrl+'/product/field';
      axios.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          product.fields=response.data.field;
          var url=window.Shop.baseUrl+'/product/'+$("#productId").val();
          axios.get(url).then(function(response) {
            if(response.status==200 && response.data.status=="OK"){
              product.product=response.data.product;
              product.breads=response.data.bread;
              $("#category"+product.breads[0].id).addClass("active");
              setTimeout(function(){
                $('[data-fancybox="gallery"]').fancybox({
                  beforeLoad:function(){
                    $("html").getNiceScroll().remove();
                  },
                  afterClose: function(){
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
              })
            }
          });
        }
      });
    },
    categoryURL:function(url){
      return window.baseURL+"/category/"+url;
    }
  },
  mounted:function(){
    this.getData();
  }
});

