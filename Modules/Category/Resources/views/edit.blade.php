@extends('theme::layout.master')

@section('title') Edycja kategorii {{ $category->name }} @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edycja kategorii - <i>{{ $category->name }}</i>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dodaj kategorię</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- small box -->
                <div class="box box-success">
                    {{ Form::open(array('route' => array('admin.category.update', $category->id), 'method' => 'put')) }}
                    {{ Form::token() }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.category.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat edycji kategorii</small></h3>
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {{ Form::label('name', 'Nazwa') }}
                            {{ Form::text('name', $category->name, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nazwa') ) }}
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('parent')) has-error @endif">
                            {{ Form::label('parent', 'Rodzic') }}
                            {{ Form::select('parent', $select, $category->parent, array('class' => 'form-control', 'id' => 'parent', 'placeholder' => 'Rodzic')) }}
                            @if ($errors->has('parent')) <p class="help-block">{{ $errors->first('parent') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('site_id')) has-error @endif">
                            {{ Form::label('site_id', 'Strona') }}
                            {{ Form::select('site_id', $site_select, $category->site_id, array('class' => 'form-control', 'id' => 'site_id', 'placeholder' => 'Strona')) }}
                            @if ($errors->has('site_id')) <p class="help-block">{{ $errors->first('site_id') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('template_file')) has-error @endif">
                            {{ Form::label('template_file', 'Szablon') }}
                            {{ Form::select('template_file', $templates, $category->template_file, array('class' => 'form-control', 'id' => 'template_file')) }}
                            @if ($errors->has('template')) <p class="help-block">{{ $errors->first('template_file') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('slug')) has-error @endif">
                            {{ Form::label('slug', 'Adres URL') }}
                            {{ Form::text('slug', $category->slug, array('class' => 'form-control', 'id' => 'slug', 'placeholder' => 'Adres URL') ) }}
                            @if ($errors->has('slug')) <p class="help-block">{{ $errors->first('slug') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('weight')) has-error @endif">
                            {{ Form::label('weight', 'Waga') }}
                            {{ Form::text('weight', $category->weight, array('class' => 'form-control', 'id' => 'weight', 'placeholder' => 'Waga') ) }}
                            @if ($errors->has('weight')) <p class="help-block">{{ $errors->first('weight') }}</p> @endif
                        </div>
                        <div class="form-group">
                            <label>Widoczność kategorii</label><br />
                            @foreach ($user_groups as $group)
                                <label for="{{ $group->name }}">
                                <input id="{{ $group->name }}" type="checkbox" name="groups[{{ $group->id }}]" value="1" @if (in_array($group->id, $category->groups->lists('id'))) checked @endif>
                                    {{ $group->name }}
                                </label><br />
                            @endforeach
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