/**
 * Created by rafa on 10/04/2017.
 */
/**
 * Created by rafa on 10/04/2017.
 */
var car = new Vue({
  name: 'CarShop',
  el: '#carShop',
  data: {
    car: [],
    tax: 0.05,
    subTotal: 0
  },
  filters: {
    round: function (value) {
      return Math.round(value * 100) / 100;
    }
  },
  methods: {
    getData: function () {
      axios.get(window.Shop.baseUrl + '/car').then(function (data) {
        if (data.status == 200 && data.data.status == "OK") {
          car.car = data.data.car;
          car.refreshData()
        }
      })
    },
    refreshData: function () {
      var ammount = 0;
      car.car.forEach(function (item) {
        ammount += item.product.price * item.cant;
      });
      car.subTotal = ammount;
    }
  },
  mounted: function () {
    this.getData();
  }
});

$("body").on('click', '.addCarFast', function () {
  var productId = $(this).attr('data-id');
  axios.post(window.Shop.baseUrl + '/car', {cant: 1, product: productId}).then(function (data) {
    if (data.status == 200 && data.data.status == "OK") {
       $("#productFast"+productId).effect( "transfer", { to: $("#show-panel") }, 1000 );
      car.car = data.data.car;
      car.refreshData()
    }
  })
});

$("body").on('click', '#addCar', function () {
  console.log("asd")
  var productId = $(this).attr('data-id');
  var target = $(this).attr('data-target');
  var cant = $("#product-quantity").val();
  $("#product-quantity").val(1);
  axios.post(window.Shop.baseUrl + '/car', {cant: cant, product: productId}).then(function (data) {
    if(data.status==200 && data.data.status=="OK"){
      $(target).effect( "transfer", { to: $("#show-panel") }, 1000 );
      car.car=data.data.car;
      car.refreshData()
    }
  })

});