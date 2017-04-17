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
      this.$http.get(window.Shop.baseUrl + '/car').then(function (data) {
        if (data.status == 200 && data.data.status == "OK") {
          this.car = data.data.car;
          this.refreshData()
        }
      })
    },
    refreshData: function () {
      var ammount = 0;
      this.car.forEach(function (item) {
        ammount += item.product.price * item.cant;
      });
      this.subTotal = ammount;
    }
  },
  mounted: function () {
    this.getData();
  }
});

$("body").on('click', '.addCarFast', function () {
  var productId = $(this).attr('data-id');
  car.$http.post(window.Shop.baseUrl + '/car', {cant: 1, product: productId}).then(function (data) {
    if (data.status == 200 && data.data.status == "OK") {
      $("#productFast" + productId).effect("transfer", {to: $("#show-panel")}, 500);
      car.car = data.data.car;
      car.refreshData()
    }
  })
});

$("body").on('click', '#addCar', function () {
  var productId = $(this).attr('data-id');
  var target = $(this).attr('data-target');
  var cant = $("#product-quantity").val();
  $("#product-quantity").val(1);
  car.$http.post(window.Shop.baseUrl + '/car', {cant: cant, product: productId}).then(function (data) {
    if (data.status == 200 && data.data.status == "OK") {
      $(target).effect("transfer", {to: $("#show-panel")}, 500);
      car.car = data.data.car;
      car.refreshData()
    }
  })
});

$("body").on('click', '.removeProductCar', function () {
  var index = $(this).attr('data-index');
  car.$http.delete(window.Shop.baseUrl + '/car/'+index).then(function (data) {
    if (data.status == 200 && data.data.status == "OK") {
      car.car = data.data.car;
      car.refreshData()
    }
  })
});

$("body").on('click', '.refreshProductCar', function () {
  var id = $(this).attr('data-index');
  var cant = $("#price"+id).val();
  car.$http.post(window.Shop.baseUrl + '/car/'+id, {cant: cant}).then(function (data) {
    if (data.status == 200 && data.data.status == "OK") {
      car.car = data.data.car;
      car.refreshData()
    }
  })
});

$("#clearCar").click(function () {
  car.$http.delete(window.Shop.baseUrl + '/car/all').then(function (data) {
    if (data.status == 200 && data.data.status == "OK") {
      car.car = data.data.car;
      car.refreshData()
    }
  })
});

$(".modal").on("show.bs.modal", function () {
  $("html").getNiceScroll().remove();
});

$(".modal").on("hide.bs.modal", function () {
  $('.item-price').each(function (index, el) {
    $(el).val($(el).attr('data-default'))
  });
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
});