@extends('theme::layout.master')

@section('title') Dodawanie tekstu @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dodawanie nowego tekstu
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dodaj tekst</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- small box -->
                <div class="box box-success">

                    {{ Form::open(array('route' => array('admin.text.update', $text->id), 'method' => 'put')) }}
                    {{ Form::token() }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.text.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat dodawania nowego tekstu</small></h3>
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {{ Form::label('title', 'Tytuł') }}
                            {{ Form::text('title', $text->title, array('class' => 'form-control', 'id' => 'title', 'placeholder' => 'Tytuł') ) }}
                            @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                            {{ Form::label('category_id', 'Kategoria') }}
                            {{ Form::select('category_id', $select, $text->category_id, array('class' => 'form-control', 'id' => 'select2')) }}
                            @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('slug')) has-error @endif">
                            {{ Form::label('key', 'Klucz') }}
                            {{ Form::text('key', $text->key, array('class' => 'form-control', 'id' => 'slug', 'placeholder' => 'Klucz') ) }}
                            @if ($errors->has('key')) <p class="help-block">{{ $errors->first('key') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('weight')) has-error @endif">
                            {{ Form::label('weight', 'Waga') }}
                            {{ Form::text('weight', $text->weight, array('class' => 'form-control', 'id' => 'weight', 'placeholder' => 'Waga') ) }}
                            @if ($errors->has('weight')) <p class="help-block">{{ $errors->first('weight') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('weight')) has-error @endif">
                            {{ Form::label('content', 'Tresc') }}
                            {{ Form::textarea('content', $text->content, array('class' => 'form-control', 'id' => 'wysihtml5', 'placeholder' => 'Tresc') ) }}
                            @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
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