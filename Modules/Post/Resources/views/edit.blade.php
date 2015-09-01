@extends('theme::layout.master')

@section('title') Edycja aktualności {{ $post->title }} @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edycja aktualności <i>{{ $post->title }}</i>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edycja aktualności</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- small box -->
                <div class="box box-success">

                    {{ Form::open(array('route' => array('admin.post.update', $post->id), 'method' => 'put', 'files'=> true)) }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.post.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat dodawania nowej aktualności</small></h3>
                        </div>
                        <div class="form-group @if ($errors->has('title')) has-error @endif">
                            {{ Form::label('title', 'Tytuł') }}
                            {{ Form::text('title', $post->title, array('class' => 'form-control', 'id' => 'title', 'placeholder' => 'Tytuł') ) }}
                            @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                        </div>
                        <div class="form-group">
                            @if (!empty($post->photo))
                                {{ renderImage('posts', $post->photo, 'teaser', array('class' => 'thumbnail')) }}
                                {{ Form::label('photo', 'Zmień zdjęcie') }}
                            @else
                                {{ Form::label('photo', 'Zdjęcie') }}
                            @endif
                            <input type="file" name="photo" />
                        </div>
                        <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                            {{ Form::label('category_id', 'Kategoria') }}
                            {{ Form::select('category_id', $select, $post->category_id, array('class' => 'form-control', 'id' => 'select2')) }}
                            @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('content')) has-error @endif">
                            {{ Form::label('content', 'Tresc') }}
                            {{ Form::textarea('content', $post->content, array('class' => 'form-control', 'id' => 'wysihtml5', 'placeholder' => 'Tresc') ) }}
                            @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('tags')) has-error @endif">
                            {{ Form::label('tags', 'Tagi') }}
                            {{ Form::textarea('tags', $post->tags, array('class' => 'form-control', 'placeholder' => 'Tagi') ) }}
                            @if ($errors->has('tags')) <p class="help-block">{{ $errors->first('tags') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('badges')) has-error @endif">
                            {{ Form::label('badges', 'Parametry obrazki') }}
                            {{ Form::textarea('badges', $post->badges, array('class' => 'form-control', 'placeholder' => 'Parametry obrazki') ) }}
                            @if ($errors->has('badges')) <p class="help-block">{{ $errors->first('badges') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('parameters')) has-error @endif">
                            {{ Form::label('parameters', 'Parametry tabela') }}
                            {{ Form::textarea('parameters', $post->parameters, array('class' => 'form-control', 'placeholder' => 'Parametry tabela') ) }}
                            @if ($errors->has('parameters')) <p class="help-block">{{ $errors->first('parameters') }}</p> @endif
                        </div>
                        {{ Form::button('Zapisz zmiany', array('class' => 'btn btn-success btn-flat', 'type' => 'submit') ) }}
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