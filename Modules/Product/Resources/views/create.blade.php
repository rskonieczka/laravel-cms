@extends('theme::layout.master')

@section('title') Dodawanie produktu @stop

@section('content')

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dodawanie produktu
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dodawanie produktu</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- small box -->
                    <div class="box box-success">
                        <div class="pull-right right-buttons">
                            <a href="{{ URL::route('admin.product.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                        </div>

                        <div class="box-body">
                            <div class="box-header">
                                <i class="fa fa-info"></i>
                                <h3 class="box-title"><small>informacje na temat dodawania nowego produktu</small></h3>
                            </div>

                            {{ Form::open(array('route' => 'admin.product.store', 'files'=> true)) }}
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Treści</a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Pliki</a></li>
                                    <li role="presentation"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Galeria</a></li>
                                    <li role="presentation"><a href="#related" aria-controls="related" role="tab" data-toggle="tab">Powiązane produkty</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                                            {{ Form::label('name', 'Tytuł') }}
                                            {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'id' => 'title', 'placeholder' => 'Nazwa') ) }}
                                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"  name="special" value="1" @if(Input::old('special') == 1) checked @endif > Oferta specjalna
                                            </label>
                                        </div>
                                        <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                                            {{ Form::label('category_id', 'Kategoria') }}
                                            {{ Form::select('category_id[]', $select, Input::old('category_id'), array('class' => 'form-control', 'id' => 'select2', 'multiple' => 'multiple')) }}
                                            @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('description')) has-error @endif">
                                            {{ Form::label('description', 'Opis') }}
                                            {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control', 'id' => 'wysihtml5', 'placeholder' => 'Opis') ) }}
                                            @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('brief')) has-error @endif">
                                            {{ Form::label('brief', 'Hasła') }}
                                            {{ Form::textarea('brief', Input::old('brief'), array('class' => 'form-control', 'placeholder' => 'Hasła', 'style' => 'height:50px;') ) }}
                                            @if ($errors->has('brief')) <p class="help-block">{{ $errors->first('brief') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('voc')) has-error @endif">
                                            {{ Form::label('voc', 'VOC') }}
                                            {{ Form::textarea('voc', Input::old('voc'), array('class' => 'form-control', 'placeholder' => 'VOC', 'style' => 'height:50px;') ) }}
                                            @if ($errors->has('voc')) <p class="help-block">{{ $errors->first('voc') }}</p> @endif
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="form-group">
                                                {{ Form::label('tech_card', 'Karta techniczna') }}
                                            <input type="file" name="tech_card" />
                                        </div>
                                        <div class="form-group">
                                                {{ Form::label('char_card', 'Karta charakterystyki') }}
                                            <input type="file" name="char_card" />
                                        </div>
                                        <div class="form-group @if ($errors->has('photos')) has-error @endif">
                                            @include('media::shared.files')
                                            @if ($errors->has('photos')) <p class="help-block">{{ $errors->first('photos') }}</p> @endif
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="gallery">
                                        <div class="alert alert-info">Dodawanie zdjęć tylko w trybie edycji</div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="related">
                                        <div class="form-group @if ($errors->has('products_related')) has-error @endif">
                                            {{ Form::label('products_related', 'Powiązane produkty') }}
                                            {{ Form::select('products_related[]', $productsRelated, Input::old('category_id'), array('class' => 'form-control', 'id' => 'select22', 'multiple' => 'multiple')) }}
                                            @if ($errors->has('products_related')) <p class="help-block">{{ $errors->first('products_related') }}</p> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::button('Zapisz zmiany', array('class' => 'btn btn-success btn-flat', 'type' => 'submit') ) }}

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
        CKEDITOR.replace('wysihtml5');
        $(document).ready(function() {
            $("#select2").select2();
            $("#select22").select2();
        });
    </script>
@stop