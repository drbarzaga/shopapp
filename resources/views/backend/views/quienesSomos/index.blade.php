@extends('backend.layout.base')
@section('breadcrumb')
  <a href="javascript:;" class="current">Quienes somos</a>
@endsection
@section('css')
  @include('backend.views.froala_editor.css')
@endsection
@section('content')

  <div id="editor">
    {!! $content !!}
  </div>
@endsection
@section('js')
  @include('backend.views.froala_editor.js')
  <script>
    $('#menu_pages').addClass('open');
    $('#menu_pages').addClass('active');
    $('#submenu_quienesS').addClass('active');
    $("#guardar-1").on('click',function(){
      var content=$('#editor').froalaEditor('html.get');
      axios.post('{{route('quienes_somos_save')}}',{content:content}).then(function(data){
        console.log(data);
      })
    })
  </script>
@endsection