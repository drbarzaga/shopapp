{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'admin/local/store', 'files'=>true)) }}
@include ('backend.views.local.form')
{{ Form::close() }}