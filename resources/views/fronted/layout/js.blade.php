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
<script src="{{asset('js/axios/axios.js')}}"></script>
<script src="{{asset('fronted/js/bootstrap.touchspin.js')}}"></script>
<script type="text/javascript">
  window.Shop = {baseUrl: '{!! url('/api/') !!}', csrfToken: '{{ csrf_token() }}'};
  window.baseURL = "{{url('/')}}";
  Vue.directive('tip-bottom', function (el) {
    $(el).tooltip({ placement: 'bottom' });
  });
</script>
