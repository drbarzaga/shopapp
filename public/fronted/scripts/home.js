/**
 * Created by rafa on 10/04/2017.
 */
var home = new Vue({
  name: 'Home',
  data:{
    categories:[]
  },
  methods: {
    getData:function(){
      var url=window.Shop.baseUrl+'/category/root';
      axios.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          home.categories=response.data.category;
        }
      });
    }
  },
  mounted:function(){
    this.getData();
  }
});

// home.$mount('#dashboard');