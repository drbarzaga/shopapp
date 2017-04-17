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
      this.$http.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          this.categories=response.data.category;
        }
      });
      var url=window.Shop.baseUrl+'/product/field';
      this.$http.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          this.fields=response.data.field;
          var url=window.Shop.baseUrl+'/product/'+$("#productId").val();
          this.$http.get(url).then(function(response) {
            if(response.status==200 && response.data.status=="OK"){
              this.product=response.data.product;
              this.breads=response.data.bread;
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

