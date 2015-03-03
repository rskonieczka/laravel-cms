@extends('theme::layout.master')

@section('title') Edycja produktu {{ $product->name }} @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edycja produktu <i>{{ $product->name }}</i>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edycja produktu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- small box -->
                <div class="box box-success">

                    {{ Form::open(array('route' => array('admin.product.update', $product->id), 'method' => 'put', 'files'=> true)) }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.product.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat dodawania nowego produktu</small></h3>
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {{ Form::label('name', 'Nazwa') }}
                            {{ Form::text('name', $product->name, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nazwa') ) }}
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('price')) has-error @endif">
                            {{ Form::label('price', 'Cena') }}
                            {{ Form::text('price', $product->price, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Cena') ) }}
                            @if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
                        </div>
                        <div class="form-group">
                            @if (!empty($product->photo))
                            {{ Imagecache::get('products/'.$product->photo, 'teaser', array('class' => 'thumbnail'))->img }}
                            {{ Form::label('photo', 'Zmień zdjęcie') }}
                            @else
                            {{ Form::label('photo', 'Zdjęcie') }}
                            @endif
                            <input type="file" name="photo" />
                        </div>
                        <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                            {{ Form::label('category_id', 'Kategoria') }}
                            {{ Form::select('category_id', $select, $product->category_id, array('class' => 'form-control', 'id' => 'parent')) }}
                            @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('desc')) has-error @endif">
                            {{ Form::label('desc', 'Opis') }}
                            {{ Form::textarea('desc', $product->desc, array('class' => 'form-control', 'id' => 'wysihtml5', 'placeholder' => 'Opis') ) }}
                            @if ($errors->has('desc')) <p class="help-block">{{ $errors->first('desc') }}</p> @endif
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
</script>
@stop