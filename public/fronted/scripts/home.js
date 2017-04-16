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
      axios.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          home.categories=response.data.category;
          home.selectImg=response.data.category[0].photo;
        }
      });
    },
    categoryOver:function(img,index){
      home.selectImg=img;
      home.activeIndex=index;
    },
    categoryURL:function(url){
      return window.baseURL+"/category/"+url;
    }
  },
  mounted:function(){
    this.getData();
  }
});

