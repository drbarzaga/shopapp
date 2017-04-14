/**
 * Created by rafa on 09/04/2017.
 */
var category = new Vue({
  name: 'Category',
  data: {
    categories: [],
    allCategories: [],
    breads:[],
    select:-1
  },
  methods: {
    getData: function () {
      var url = window.Shop.baseUrl + '/category/root';
      axios.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          category.categories = response.data.category;
          category.breads=response.data.bread;
          category.parentSelect=-1;
          $("#parent").val(-1).trigger('change');
          category.select=-1;
        }

      });
      var url = window.Shop.baseUrl + '/category';
      axios.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          category.allCategories = response.data.category;
        }
      });
    },
    getCategory: function(id){
      if(id==category.select)
        return;
      var url = window.Shop.baseUrl + '/category/'+id;
      axios.get(url).then(function (response) {
        if (response.status == 200 && response.data.status == "OK") {
          category.categories = response.data.category.get_childrens;
          category.breads=response.data.bread;
          $("#parent").val(id).trigger('change');
          category.select=id;
        }
      });
    },
    onFileChange: function (e) {
      var file = e.target.files || e.dataTransfer.files;
      $('#fotoText').val(file[0].name);
    }
  },
  mounted: function () {
    this.getData();
  }
});

category.$mount('#content');
$(".modal").on("hidden", function () {
  $(".control-group").removeClass('success');
  $("#fotoText").val("");
  $("#title").val("");
  $("#parent").val(category.select).trigger('change');
});

$('#fotoBtn').click(function () {
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
    var formData = new FormData();
    formData.append("title",$("#title").val());
    formData.append("parent",$("#parent").val());
    formData.append("foto",document.getElementById('inputFoto').files[0]);
    axios.post($('#urlCreate').val(),formData).then(function (res){
      if(res.status==200 && res.data.status=="OK"){
        if(res.data.category.parent==category.select || (category.select=-1 && res.data.category.parent=="")){
          category.categories.push(res.data.category);
        }
        $("#addCategory").modal("hide");
      }
    });
  }
});

