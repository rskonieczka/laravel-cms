@extends('theme::layout.master')

@section('title') Dodawanie kategorii @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dodawanie nowej kategorii
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

                    {{ Form::open(array('route' => 'admin.category.store')) }}
                    {{ Form::token() }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.category.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat dodawania nowej kategorii</small></h3>
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {{ Form::label('name', 'Nazwa') }}
                            {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nazwa') ) }}
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('parent')) has-error @endif">
                            {{ Form::label('parent', 'Rodzic') }}
                            {{ Form::select('parent', $select, Input::old('parent'), array('class' => 'form-control', 'id' => 'select2')) }}
                            @if ($errors->has('parent')) <p class="help-block">{{ $errors->first('parent') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('site_id')) has-error @endif">
                            {{ Form::label('site_id', 'Strona') }}
                            {{ Form::select('site_id', $site_select, Input::old('site_id'), array('class' => 'form-control', 'id' => 'site_id', 'placeholder' => 'Strona')) }}
                            @if ($errors->has('site_id')) <p class="help-block">{{ $errors->first('site_id') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('device')) has-error @endif">
                            {{ Form::label('device', 'Urządzenia') }}
                            {{ Form::select('device', ['all' => 'wszystkie', 'mobile' => 'mobilne', 'desktop' => 'desktop'], Input::old('device'), array('class' => 'form-control', 'id' => 'select2')) }}
                            @if ($errors->has('device')) <p class="help-block">{{ $errors->first('device') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('template_file')) has-error @endif">
                            {{ Form::label('template_file', 'Szablon') }}
                            {{ Form::select('template_file', $templates, Input::old('template_file'), array('class' => 'form-control', 'id' => 'template_file')) }}
                            @if ($errors->has('template_file')) <p class="help-block">{{ $errors->first('template_file') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('slug')) has-error @endif">
                            {{ Form::label('slug', 'Adres URL') }}
                            {{ Form::text('slug', Input::old('slug'), array('class' => 'form-control', 'id' => 'slug', 'placeholder' => 'Adres URL') ) }}
                            @if ($errors->has('slug')) <p class="help-block">{{ $errors->first('slug') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('weight')) has-error @endif">
                            {{ Form::label('weight', 'Waga') }}
                            {{ Form::text('weight', Input::old('weight'), array('class' => 'form-control', 'id' => 'weight', 'placeholder' => 'Waga') ) }}
                            @if ($errors->has('weight')) <p class="help-block">{{ $errors->first('weight') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('lang')) has-error @endif">
                            {{ Form::label('lang', 'Język') }}
                            {{ Form::select('lang', ['pl' => 'pl', 'en' => 'en'], null, array('class' => 'form-control', 'id' => 'lang')) }}
                            @if ($errors->has('slug')) <p class="help-block">{{ $errors->first('lang') }}</p> @endif
                        </div>
                        <div class="form-group">
                            <label>Widoczność kategorii</label><br />
                            @foreach ($user_groups as $group)
                                <label for="{{ $group->name }}">
                                    <input id="{{ $group->name }}" type="checkbox" name="groups[{{ $group->id }}]" value="1" >
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
@section('extrascripts')
    <script type="text/javascript">
        $(document).ready(function() { $("#select2").select2(); });
    </script>
@stop