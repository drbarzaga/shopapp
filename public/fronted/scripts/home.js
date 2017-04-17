/**
 * Created by rafa on 10/04/2017.
 */
var home = new Vue({
  name: 'Home',
  el:'#templateVue',
  data:{
    categories:[],
    selectImg:'',
    activeIndex:0
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
    },
    categoryOver:function(img,index){
      this.selectImg=img;
      this.activeIndex=index;
    },
    categoryURL:function(url){
      return window.baseURL+"/category/"+url;
    }
  },
  mounted:function(){
    this.getData();
  }
});

