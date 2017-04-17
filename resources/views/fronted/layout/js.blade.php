<script src="{{asset('fronted/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('fronted/js/jquery-ui.js')}}"></script>
<script src="{{asset('fronted/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fronted/js/modernizr.custom.js')}}"></script>
<script src="{{asset('fronted/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('fronted/js/lightbox.min.js')}}"></script>
<script src="{{asset('fronted/js/jquery.appear.js')}}"></script>
<script src="{{asset('fronted/js/jquery.fitvids.js')}}"></script>
<script src="{{asset('fronted/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('fronted/js/superfish.min.js')}}"></script>
<script src="{{asset('fronted/js/supersubs.js')}}"></script>
<script src="{{asset('fronted/js/styleswitcher.js')}}"></script>
<script src="{{asset('fronted/js/script.js')}}"></script>
<script src="{{asset('js/vue2/vue.js')}}"></script>
<script src="{{asset('js/vue2/vue-resource.js')}}"></script>
<script src="{{asset('fronted/js/bootstrap.touchspin.js')}}"></script>
<script type="text/javascript">
  window.Shop = {baseUrl: '{!! url('/api/') !!}', csrfToken: '{{ csrf_token() }}'};
  window.baseURL = "{{url('/')}}";
  Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
  Vue.directive('tip-bottom', function (el) {
    $(el).tooltip({ placement: 'bottom' });
  });
  Vue.directive('touch-spin', function (el) {
    setTimeout(function () {
      $(el).TouchSpin({
        verticalbuttons: true,
        min:1
      });
    });
  });

</script>
<script src="{{asset('fronted/scripts/carShop.js')}}"></script>

