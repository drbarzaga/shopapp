@extends('backend.layout.base')
@section('breadcrumb')
  <a href="javascript:;" class="current">Contáctenos</a>
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
    $('#menu_pages').addClass('active');
    $('#submenu_conctatc').addClass('active');
    $("#guardar-1").on('click',function(){
      var content=$('#editor').froalaEditor('html.get');
      $.post('{{route('contactenos_save')}}',{content:content,_token: window.Shop.csrfToken}).then(function(data){
        console.log(data);
      })
    })
  </script>
@endsection