@extends('user::auth.master')
 
@section('title') Login @stop
 
@section('content')
{{ $error = Session::get('error') }}

<div class="form-box" id="login-box">
    <div class="header">{{Lang::get('admin/auth/login.sign_in')}}</div>
    {{ Form::open(['role' => 'form']) }}
        <div class="body bg-gray">
            @if ($errors->has())
                @foreach ($errors->all() as $error)
                    <div class='alert alert-danger'>{{ $error }}</div>
                @endforeach
            @endif
            <div class="form-group">
                {{ Form::text('email', null, ['placeholder' => Lang::get('admin/auth/login.email'), 'class' => 'form-control']) }}
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>
            <div class="form-group">
                {{ Form::password('password', ['placeholder' => Lang::get('admin/auth/login.password'), 'class' => 'form-control']) }}
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>
            <div class="form-group">
                <label for="remember_me">
                <input type="checkbox" id="remember_me" name="remember_me"/> {{Lang::get('admin/auth/login.remember_me')}}</label>
            </div>
        </div>
        <div class="footer">
            {{ Form::submit(Lang::get('admin/auth/login.sign_me_in'), ['class' => 'btn bg-olive btn-block']) }}
        </div>
    {{ Form::close() }}
</div>
 
@stop