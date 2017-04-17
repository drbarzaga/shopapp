@extends('fronted.layout.master')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="default-page">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Usuario</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}" required
                       autofocus>

                @if ($errors->has('username'))
                  <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">Correo</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                  <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Contraseña</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>


            @foreach($fields as $field)
              <div class="form-group">
                <label for="{!! str_replace('_', ' ', $field->field) !!}" class="col-md-4 control-label">{{$field->field}}</label>

                <div class="col-md-6">
                  <input id="{!! str_replace('_', ' ', $field->field) !!}" class="form-control" name="{{$field->id}}" required>
                </div>
              </div>
            @endforeach

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Crear usuario
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
