/**
 * Created by rafa on 09/04/2017.
 */
var product = new Vue({
  name: 'Product',
  data: {
    categories: [],
    fields: [],
    fieldsData: {},
    products: [],
    selected: -1
  },
  methods: {
    getData: function () {
      var url = window.Shop.baseUrl + '/product/field';
      axios.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          product.fields = response.data.field;
          var url = window.Shop.baseUrl + '/product';
          axios.get(url).then(function (response) {
            if (response.status == 200 && response.data.status == "OK") {
              product.products = response.data.products;
              setTimeout(function () {
                $('.bxslider').removeClass("hide");
                $('.bxslider').bxSlider({
                  auto: true,
                  pause: 3000
                });
              });
            }
          })
        }
      });
      var url = window.Shop.baseUrl + '/category';
      axios.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          product.categories = response.data.category;
          product.selected = response.data.category[0].id;
          setTimeout(function(){
            $("select").select2({
              placeholder: 'Select an option'
            });
          })
        }
      });
    }
  },
  mounted: function () {
    this.getData()
  }
});

product.$mount("#content");

$(".modal").on("hidden", function () {
  $("#fotoShows").html("");
  $("#fotoContainer").html("");
  $(".nav-tabs li").removeClass("active");
  $(".nav-tabs li").first().addClass("active");
  $(".tab-pane").removeClass("active");
  $(".tab-pane").first().addClass("active");
  $("#category").val(product.selected).trigger('change');
});

$("#addProductBtn").click(function () {
  $("#productForm").submit()
});

$("#productForm").validate({
  rules: {
    title: {
      required: true
    },
    category: {
      required: true
    },
    price: {
      required: true,
      number: true
    }
  },
  messages: {
    title: {
      required: "El titulo no puede estar vacío"
    },
    category: {
      required: "El titulo no puede estar vacío"
    },
    price: {
      required: "El precio no puede estar vacío",
      number: "El precio debe ser un número"
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
    var formData = new FormData();
    var category = $("#category").val();
    formData.append("title", $("#title").val());
    formData.append("price", $("#price").val());
    formData.append("category_id", category);
    $(".fotoElement").each(function (index, el) {
      formData.append('fotos[]', el.files[0]);
    });
    $(".field").each(function () {
      var element = $(this);
      formData.append("field[]", JSON.stringify({id: element.attr('data-id'), value: element.val()}));
    });
    axios.post($('#urlCreate').val(), formData).then(function (res) {
      if (res.status == 200 && res.data.status == "OK") {
        product.getData();
        $("#addProduct").modal("hide");
      }
    });
  }
});
$('#addFoto').click(function () {
  var id = guid();
  var input = $('<input/>').attr('id', id).attr('class', 'fotoElement').attr('type', 'file').attr('accept', 'image/*').on('change', function (e) {
    $('#fotoContainer').append(input);
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#fotoShows').append(
        '<tr><td><img class="img-responsive" src="' + e.target.result + '"/></td><td>Portada</td><td><a data-original-title="Eliminar" class="btn tip-bottom removeFoto" data-id="' + id + '"><i style="color: rgb(218, 79, 73);" class="icon icon-remove"></i></a></td></tr>'
      );
    };
    reader.readAsDataURL(e.target.files[0]);
  }).click();
});
function guid() {
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}
function s4() {
  return Math.floor((1 + Math.random()) * 0x10000)
    .toString(16)
    .substring(1);
}
$(".removeFoto").live('click', function () {
  id = $(this).attr('data-id');
  $(this).parent().parent().remove();
  $("#" + id).remove();
});