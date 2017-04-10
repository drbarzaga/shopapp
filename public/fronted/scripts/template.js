/**
 * Created by rafa on 10/04/2017.
 */
var template = new Vue({
  name: 'Template',
  data:{
    categories:[]
  },
  methods: {
    getData:function(){
      var url=window.Shop.baseUrl+'/category';
      axios.get(url).then(function(response) {
        if(response.status==200 && response.data.status=="OK"){
          template.categories=response.data.category;
        }
      });
    }
  },
  mounted:function(){
    this.getData();
  }
});

template.$mount('#navbar');
template.$mount('#dashboard');