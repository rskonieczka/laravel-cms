@extends('theme::layout.master')

@section('title') Dodawanie użytkownika @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edycja użytkownika <i>{{ $user->email }}</i>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edycja użytkownika</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                @if ( Session::get('message'))
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Sukces!</b> {{  Session::get('message') }}
                    </div>
                @endif
                {{ $error = Session::get('error') }}

                @if ($errors->has())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Błąd!</b> {{ $error }}
                        </div>
                    @endforeach
                @endif
                <!-- small box -->
                <div class="box box-success">
                    {{ Form::open(array('route' => array('admin.user.update', $user->id), 'method' => 'put')) }}
                    {{ Form::token() }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.user.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat dodawania nowego użytkownika</small></h3>
                        </div>
                        <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                            {{ Form::label('first_name', 'Imię') }}
                            {{ Form::text('first_name', $user->first_name, array('class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Imię') ) }}
                            @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                            {{ Form::label('last_name', 'Nazwisko') }}
                            {{ Form::text('last_name', $user->last_name, array('class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Nazwisko') ) }}
                            @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            {{ Form::label('email', 'E-mail (login)') }}
                            {{ Form::text('email', $user->email, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-mail (login)') ) }}
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('password')) has-error @endif">
                            {{ Form::label('password', 'Nowe hasło') }}
                            {{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Nowe hasło') ) }}
                            @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('password2')) has-error @endif">
                            {{ Form::label('password2', 'Powtórz hasło') }}
                            {{ Form::password('password2', array('class' => 'form-control', 'id' => 'password2', 'placeholder' => 'Powtórz hasło') ) }}
                            @if ($errors->has('password2')) <p class="help-block">{{ $errors->first('password2') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('group_id')) has-error @endif">
                            {{ Form::label('group_id', 'Grupa') }}
                            {{ Form::select('group_id', $groups, $userGroup, array('class' => 'form-control', 'id' => 'site_id', 'placeholder' => 'Grupa')) }}
                            @if ($errors->has('group_id')) <p class="help-block">{{ $errors->first('group_id') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            {{ Form::label('activated', 'Aktywuj konto') }}
                            <br />
                            {{ Form::checkbox('activated', 1, $user->activated, array('class' => 'form-control', 'id' => 'activated', 'placeholder' => 'Aktywuj konto') ) }}
                            @if ($errors->has('activated')) <p class="help-block">{{ $errors->first('activated') }}</p> @endif
                        </div>

                        {{ Form::button('Dodaj', array('class' => 'btn btn-success btn-flat', 'type' => 'submit') ) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->

@stop