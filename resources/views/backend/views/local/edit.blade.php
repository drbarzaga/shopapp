{{ Html::ul($errors->all()) }}

{{ Form::model($local,array('url' => ['admin/local/update',$local->id], 'files'=>true)) }}
@include ('backend.views.local.form', ['submitButtonText' => 'Update'])
{{ Form::close() }}