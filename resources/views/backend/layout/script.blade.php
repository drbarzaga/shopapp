<script src="{{asset('backend/js/excanvas.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('backend/js/jquery.uniform.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.flot.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.peity.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.js')}}"></script>
<script src="{{asset('backend/js/jquery.gritter.min.js')}}"></script>
<script src="{{asset('js/vue2/vue.js')}}"></script>
<script src="{{asset('js/axios/axios.js')}}"></script>
<script type="text/javascript">
  var APP_URL = "{!! url('/') !!}";
  window.Shop = {baseUrl: '{!! url('/api/') !!}', csrfToken: '{{ csrf_token() }}'};
  Vue.directive('tip-bottom', function (el) {
    $(el).tooltip({ placement: 'bottom' });
  });
</script>