{{ Form::text('title',Input::old('title')) }}
{{ Form::textarea('description',Input::old('description')) }}
{{ Form::file('photo',Input::old('photo')) }}
{{ Form::text('urlmap',Input::old('urlmap')) }}
{!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create') !!}