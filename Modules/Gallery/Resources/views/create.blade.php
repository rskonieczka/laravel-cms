@extends('theme::layout.master')

@section('title') Dodawanie tekstu @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dodawanie nowej galerii
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dodaj galerię</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- small box -->
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-info"></i>
                        <h3 class="box-title"><small>Lista galerii dostępnych w serwisie</small></h3>
                    </div>
                    <div class="box-body">
                        {{ Form::open(array('route' => 'admin.gallery.store')) }}
                        {{ Form::token() }}
                        <div class="pull-right right-buttons">
                            <a href="{{ URL::route('admin.gallery.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                        </div>
                        <div class="form-group @if ($errors->has('title')) has-error @endif">
                            {{ Form::label('title', 'Tytuł') }}
                            {{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'id' => 'title', 'placeholder' => 'Tytuł') ) }}
                            @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('key')) has-error @endif">
                            {{ Form::label('key', 'Klucz') }}
                            {{ Form::text('key', Input::old('key'), array('class' => 'form-control', 'id' => 'key', 'placeholder' => 'Klucz') ) }}
                            @if ($errors->has('key')) <p class="help-block">{{ $errors->first('key') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                            {{ Form::label('category_id', 'Kategoria') }}
                            {{ Form::select('category_id', $select, Input::old('category_id'), array('class' => 'form-control', 'id' => 'select2')) }}
                            @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
                        </div>
                         <div class="form-group @if ($errors->has('photos')) has-error @endif">
                            @include('media::shared.list')
                            @if ($errors->has('photos')) <p class="help-block">{{ $errors->first('photos') }}</p> @endif
                        </div>
                        {{ Form::button('Dodaj galerię', array('class' => 'btn btn-success btn-flat', 'type' => 'submit') ) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->

@stop

@section('extrascripts2')
<script type="text/javascript">
    $(document).ready(function() { $("#select2").select2(); });
</script>
@stop