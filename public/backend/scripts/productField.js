/**
 * Created by rafa on 09/04/2017.
 */
var porductField = new Vue({
  name: 'porductField',
  data: {
    fields: [],
  },
  methods: {
    getData: function () {
      var url = window.Shop.baseUrl + '/product/field';
      this.$http.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          this.fields=response.data.field;
        }

      });
    }
  },
  mounted: function () {
    this.getData();
  }
});

porductField.$mount('#content');
$('#addFieldBtn').click(function () {
  $("#fieldForm").submit();
});
$("#fieldForm").validate({
  rules: {
    title: {
      required: true
    }
  },
  messages: {
    title: {
      required: "El campo no puede estar vacío"
    }
  },
  errorClass: "help-inline",
  errorElement: "span",
  highlight: function (element, errorClass, validClass) {
    $(element).parents('.control-group').addClass('error');
  },
  unhighlight: function (element, errorClass, validClass) {
    $(element).parents('.control-group').removeClass('error');
    $(element).parents('.control-group').addClass('success');
  },
  submitHandler: function () {
    var url = $("#urlCreate").val();
    var field = $("#title").val();
    porductField.$http.post(url,{field:field}).then(function (res) {
      porductField.fields.push(res.data.field);
      $("#addField").modal('hide');
    })
  }
});

$(".modal").on("hidden", function () {
  $(".control-group").removeClass('success');
  $("#title").val("");
});