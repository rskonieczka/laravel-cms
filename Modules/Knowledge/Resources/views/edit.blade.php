@extends('theme::layout.master')

@section('title') Baza wiedzy @stop

@section('content')

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edycja postu <i>{{ $knowledge->title }}</i>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edycja postu</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- small box -->
                    <div class="box box-success">

                        {{ Form::open(array('route' => array('admin.knowledge.update', $knowledge->id), 'method' => 'put', 'files'=> true)) }}
                        {{ Form::token() }}
                        <div class="pull-right right-buttons">
                            <a href="{{ URL::route('admin.knowledge.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                        </div>
                        <div class="box-body">
                            <div class="box-header">
                                <i class="fa fa-info"></i>
                                <h3 class="box-title"><small>informacje na temat dodawania nowego tekstu</small></h3>
                            </div>
                            <div class="form-group @if ($errors->has('title')) has-error @endif">
                                {{ Form::label('title', 'Tytuł') }}
                                {{ Form::text('title', $knowledge->title, array('class' => 'form-control', 'id' => 'title', 'placeholder' => 'Tytuł') ) }}
                                @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                                {{ Form::label('category_id', 'Kategoria') }}
                                {{ Form::select('category_id', $select, $knowledge->category_id, array('class' => 'form-control', 'id' => 'parent')) }}
                                @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('content')) has-error @endif">
                                {{ Form::label('content', 'Tresc') }}
                                {{ Form::textarea('content', $knowledge->content, array('class' => 'form-control', 'id' => 'wysihtml5', 'placeholder' => 'Tresc') ) }}
                                @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('causes')) has-error @endif">
                                {{ Form::label('causes', 'Przyczyny') }}
                                {{ Form::textarea('causes', $knowledge->causes, array('class' => 'form-control', 'id' => 'wysihtml6', 'placeholder' => 'Przyczyny') ) }}
                                @if ($errors->has('causes')) <p class="help-block">{{ $errors->first('causes') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('prevention')) has-error @endif">
                                {{ Form::label('prevention', 'Zapobieganie') }}
                                {{ Form::textarea('prevention', $knowledge->prevention, array('class' => 'form-control', 'id' => 'wysihtml7', 'placeholder' => 'Zapobieganie') ) }}
                                @if ($errors->has('prevention')) <p class="help-block">{{ $errors->first('prevention') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('repair')) has-error @endif">
                                {{ Form::label('repair', 'Naprawa') }}
                                {{ Form::textarea('repair', $knowledge->repair, array('class' => 'form-control', 'placeholder' => 'Naprawa') ) }}
                                @if ($errors->has('repair')) <p class="help-block">{{ $errors->first('repair') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('movie')) has-error @endif">
                                {{ Form::label('movie', 'Film') }}
                                {{ Form::textarea('movie', $knowledge->movie, array('class' => 'form-control', 'id' => 'wysihtml8', 'placeholder' => 'Film') ) }}
                                @if ($errors->has('movie')) <p class="help-block">{{ $errors->first('movie') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('photos')) has-error @endif">
                                @include('media::shared.files')
                                @if ($errors->has('photos')) <p class="help-block">{{ $errors->first('photos') }}</p> @endif
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

@section('extrascripts2')
    <script type="text/javascript">
        CKEDITOR.replace('wysihtml5');
        CKEDITOR.replace('wysihtml6');
        CKEDITOR.replace('wysihtml7');
        CKEDITOR.replace('wysihtml8');
    </script>
@stop