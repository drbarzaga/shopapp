<script type="text/javascript" src="{{asset('backend/froala/js/froala_editor.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/align.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/char_counter.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/code_beautifier.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/code_view.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/colors.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/draggable.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/emoticons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/entities.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/font_size.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/font_family.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/fullscreen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/image.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/line_breaker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/inline_style.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/link.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/lists.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/paragraph_format.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/paragraph_style.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/quick_insert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/quote.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/table.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/save.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/plugins/url.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/froala/js/languages/es.js')}}"></script>
<script>
  $.FroalaEditor.DefineIcon('guardar', {NAME: 'save'});
  $.FroalaEditor.RegisterCommand('guardar', {
    title: 'Guardar',
    focus: true,
    undo: true,
    class:'save',
    refreshAfterCallback: true
  });
  $('#editor').froalaEditor({
    language:'es',
    imageUploadURL: "{{route('img_upload')}}",
    imageUploadParam: 'image',
    imageUploadParams: {_token: window.Shop.csrfToken,server:window.Shop.baseUrl},
    toolbarButtons: ['guardar','|','fullscreen', 'print', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'specialCharacters', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html']
  }).on('froalaEditor.image.removed', function (e, editor, $img) {
    axios.post('{{route('img_delete')}}',{src:$img.attr('src')});
  });
</script>