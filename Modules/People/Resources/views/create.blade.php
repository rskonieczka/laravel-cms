@extends('theme::layout.master')

@section('name') Dodawanie panelu @stop

@section('content')

<aside class="right-side">
    <!-- desc Header (Page header) -->
    <section class="content-header">
        <h1>
            Dodawanie nowego uczestnika
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dodaj uczestnika</li>
        </ol>
    </section>

    <!-- Main desc -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- small box -->
                <div class="box box-success">

                    {{ Form::open(array('route' => 'admin.people.store', 'files'=> true)) }}
                    {{ Form::token() }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.people.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat dodawania nowego panelu</small></h3>
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {{ Form::label('name', 'Imię i Nazwisko') }}
                            {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Imię i Nazwisko') ) }}
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('photo')) has-error @endif">
                            {{ Form::label('photo', 'Zdjęcie') }}
                            <input type="file" name="photo" />
                            @if ($errors->has('photo')) <p class="help-block">{{ $errors->first('photo') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('desc')) has-error @endif">
                            {{ Form::label('desc', 'Opis') }}
                            {{ Form::textarea('desc', Input::old('desc'), array('class' => 'form-control', 'id' => 'wysihtml5', 'placeholder' => 'Opis') ) }}
                            @if ($errors->has('desc')) <p class="help-block">{{ $errors->first('desc') }}</p> @endif
                        </div>
                        {{ Form::button('Dodaj', array('class' => 'btn btn-success btn-flat', 'type' => 'submit') ) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

    </section><!-- /.desc -->
</aside><!-- /.right-side -->

@stop

@section('extrascripts')
<script type="text/javascript">
    CKEDITOR.replace('wysihtml5');
</script>
@stop