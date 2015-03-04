@extends('theme::layout.master')

@section('title') Dodawanie użytkownika @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dodawanie grupy
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dodaj użytkownika</li>
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

                    {{ Form::open(array('route' => 'admin.group.store')) }}
                    {{ Form::token() }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.group.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat dodawania nowej grupy</small></h3>
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {{ Form::label('name', 'Nazwa grupy') }}
                            {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nazwa grupy') ) }}
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('permissions')) has-error @endif">
                            {{ Form::label('permissions', 'Prawa') }}
                            {{ Form::textarea('permissions', Input::old('permissions'), array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Prawa') ) }}
                            @if ($errors->has('permissions')) <p class="help-block">{{ $errors->first('permissions') }}</p> @endif
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