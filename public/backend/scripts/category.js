/**
 * Created by rafa on 09/04/2017.
 */
var category = new Vue({
  name: 'Category',
  data:{
    categories:[]
  },
  methods: {
    getData:function(){
      var url=window.Shop.baseUrl+'/category';
      axios.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          category.categories=response.data.category;
        }
      });
    }
  },
  mounted:function(){
    this.getData();
  }
});

category.$mount('#category-container');