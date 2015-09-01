@extends('theme::layout.master')

@section('title') Osoba kontaktowa @stop

@section('content')

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dodawanie nowej osoby kontaktowej
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dodaj nową osobę kontaktową</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- small box -->
                    <div class="box box-success">

                        {{ Form::open(array('route' => 'admin.kontaktperson.store')) }}
                        {{ Form::token() }}
                        <div class="pull-right right-buttons">
                            <a href="{{ URL::route('admin.kontaktperson.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                        </div>
                        <div class="box-body">
                            <div class="box-header">
                                <i class="fa fa-info"></i>
                                <h3 class="box-title"><small>informacje na temat dodawania nowej osoby kontaktowej</small></h3>
                            </div>
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                {{ Form::label('name', 'Imie i nazwisko') }}
                                {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Imie i nazwisko') ) }}
                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('title')) has-error @endif">
                                {{ Form::label('title', 'Tytuł') }}
                                {{ Form::textarea('title', Input::old('title'), array('class' => 'form-control', 'id' => 'wysihtml5', 'placeholder' => 'Tytuł') ) }}
                                @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                                {{ Form::label('category_id', 'Kategoria') }}
                                {{ Form::select('category_id', $select, Input::old('category_id'), array('class' => 'form-control', 'id' => 'select2')) }}
                                @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('email')) has-error @endif">
                                {{ Form::label('email', 'E-mail') }}
                                {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-mail') ) }}
                                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('phone')) has-error @endif">
                                {{ Form::label('phone', 'Telefon') }}
                                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Telefon') ) }}
                                @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('section')) has-error @endif">
                                {{ Form::label('section', 'Sekcja') }}
                                {{ Form::text('section', Input::old('section'), array('class' => 'form-control', 'id' => 'section', 'placeholder' => 'Sekcja') ) }}
                                @if ($errors->has('section')) <p class="help-block">{{ $errors->first('section') }}</p> @endif
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

@section('extrascripts')
    <script type="text/javascript">
        CKEDITOR.replace('wysihtml5');
        $(document).ready(function() { $("#select2").select2(); });
    </script>
@stop