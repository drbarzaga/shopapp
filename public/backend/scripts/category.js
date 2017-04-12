/**
 * Created by rafa on 09/04/2017.
 */
var category = new Vue({
  name: 'Category',
  data: {
    categories: [],
    newCategory: {title: '', parent: -1, foto: null}
  },
  methods: {
    getData: function () {
      var url = window.Shop.baseUrl + '/category';
      axios.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          category.categories = response.data.category;
        }
      });
    },
    onFileChange: function (e) {
      var file = e.target.files || e.dataTransfer.files;
      $('#fotoText').val(file[0].name);
    },
  },
  mounted: function () {
    this.getData();
  }
});

category.$mount('#category-container');
$(".modal").on("hidden", function () {
  category.newCategory = {};
});

$('#fotoBtn').focus(function () {
  $('#inputFoto').click();
});

$('#addCategoryBtn').click(function () {
  $("#categoryForm").submit();
});

$("#categoryForm").validate({
  rules: {
    title: {
      required: true
    },
    fotoText: {
      required: true
    }
  },
  messages: {
    title: {
      required: "El titulo no puede estar vacío"
    },
    fotoText: {
      required: "Seleccione una imagen"
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
  errorPlacement: function (error, element) {
    if (element.parent().hasClass('input-append')) {
      error.appendTo(element.parent().parent());
    } else {
      error.insertAfter(element)
    }
  },
  submitHandler: function () {
    // console.log($("#categoryForm").serialize())
    var formData = new FormData($("#categoryForm"));
    console.log(formData)
  }
});

