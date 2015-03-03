@extends('theme::layout.master')

@section('title') Dodawanie strony @stop

@section('content')

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dodawanie nowej strony
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dodaj stronę</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- small box -->
                    <div class="box box-success">

                        {{ Form::open(array('route' => 'admin.site.store')) }}
                        <div class="pull-right right-buttons">
                            <a href="{{ URL::route('admin.site.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                        </div>
                        <div class="box-body">
                            <div class="box-header">
                                <i class="fa fa-info"></i>
                                <h3 class="box-title"><small>informacje na temat dodawania nowej strony</small></h3>
                            </div>
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                {{ Form::label('name', 'Nazwa') }}
                                {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nazwa') ) }}
                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('domain')) has-error @endif">
                                {{ Form::label('domain', 'Domena') }}
                                {{ Form::text('domain', Input::old('domain'), array('class' => 'form-control', 'id' => 'domain', 'placeholder' => 'Domena') ) }}
                                @if ($errors->has('domain')) <p class="help-block">{{ $errors->first('domain') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('theme')) has-error @endif">
                                {{ Form::label('theme', 'Szablon') }}
                                {{ Form::text('theme', Input::old('theme'), array('class' => 'form-control', 'id' => 'theme', 'placeholder' => 'Szablon') ) }}
                                @if ($errors->has('theme')) <p class="help-block">{{ $errors->first('theme') }}</p> @endif
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
    </script>
@stop