/**
 * Created by rafa on 09/04/2017.
 */
var userField = new Vue({
  name: 'userField',
  el:"#content",
  data: {
    fields: [],
  },
  methods: {
    getData: function () {
      var url = window.Shop.baseUrl + '/product/field';
      axios.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          userField.fields=response.data.field;
        }

      });
    }
  },
  mounted: function () {
    this.getData();
  }
});

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
    axios.post(url,{field:field}).then(function (res) {
      userField.fields.push(res.data.field);
      $("#addField").modal('hide');
    })
  }
});

$(".modal").on("hidden", function () {
  $(".control-group").removeClass('success');
  $("#title").val("");
});