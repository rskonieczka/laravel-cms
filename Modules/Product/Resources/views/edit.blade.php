@extends('theme::layout.master')

@section('title') Edycja aktualności {{ $product->title }} @stop

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

                        <div class="pull-right right-buttons">
                            <a href="{{ URL::route('admin.product.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                        </div>

                        <div class="box-body">
                            <div class="box-header">
                                <i class="fa fa-info"></i>
                                <h3 class="box-title"><small>informacje na temat dodawania nowego produktu</small></h3>
                            </div>

                            {{ Form::open(array('route' => array('admin.product.update', $product->id), 'method' => 'put', 'files'=> true)) }}
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Treści</a></li>
                                    <li role="presentation"><a href="#more" aria-controls="more" role="tab" data-toggle="tab">Dodatkowe parametry</a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Pliki</a></li>
                                    <li role="presentation"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Galeria</a></li>
                                    <li role="presentation"><a href="#related" aria-controls="related" role="tab" data-toggle="tab">Powiązane produkty</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                                            {{ Form::label('name', 'Tytuł') }}
                                            {{ Form::text('name', $product->name, array('class' => 'form-control', 'id' => 'title', 'placeholder' => 'Nazwa') ) }}
                                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                        </div>
                                        <div class="form-group">
                                            Novol ID: {{ $product->novol_id }}
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"  name="special" value="1" @if($product->special == 1) checked @endif > Oferta specjalna
                                            </label>
                                        </div>
                                        <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                                            {{ Form::label('category_id', 'Kategoria') }}
                                            {{ Form::select('category_id[]', $select, $product->category->lists('id'), array('class' => 'form-control', 'id' => 'select2', 'multiple' => 'multiple')) }}
                                            @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('description')) has-error @endif">
                                            {{ Form::label('description', 'Opis') }}
                                            {{ Form::textarea('description', $product->description, array('class' => 'form-control', 'id' => 'wysihtml5', 'placeholder' => 'Opis') ) }}
                                            @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('brief')) has-error @endif">
                                            {{ Form::label('brief', 'Hasła') }}
                                            {{ Form::textarea('brief', $product->brief, array('class' => 'form-control', 'placeholder' => 'Hasła', 'style' => 'height:50px;') ) }}
                                            @if ($errors->has('brief')) <p class="help-block">{{ $errors->first('brief') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('voc')) has-error @endif">
                                            {{ Form::label('voc', 'VOC') }}
                                            {{ Form::textarea('voc', $product->voc, array('class' => 'form-control', 'placeholder' => 'VOC', 'style' => 'height:50px;') ) }}
                                            @if ($errors->has('voc')) <p class="help-block">{{ $errors->first('voc') }}</p> @endif
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="more">
                                        <div class="form-group @if ($errors->has('icons')) has-error @endif">
                                            {{ Form::label('icons', 'Ikony') }}
                                            {{ Form::textarea('icons', $product->icons, array('class' => 'form-control', 'id' => 'wysihtml6', 'placeholder' => 'Ikony') ) }}
                                            @if ($errors->has('icons')) <p class="help-block">{{ $errors->first('icons') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('table')) has-error @endif">
                                            {{ Form::label('table', 'Tabela') }}
                                            {{ Form::textarea('table', $product->table, array('class' => 'form-control', 'id' => 'wysihtml7', 'placeholder' => 'Tabela') ) }}
                                            @if ($errors->has('table')) <p class="help-block">{{ $errors->first('table') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('table_mobile')) has-error @endif">
                                            {{ Form::label('table_mobile', 'Tabela mobilna') }}
                                            {{ Form::textarea('table_mobile', $product->table_mobile, array('class' => 'form-control', 'id' => 'wysihtml8', 'placeholder' => 'Tabela mobilna') ) }}
                                            @if ($errors->has('table_mobile')) <p class="help-block">{{ $errors->first('table_mobile') }}</p> @endif
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="form-group">
                                            @if (!empty($product->tech_card))
                                                {{ Form::label('tech_card', 'Karta techniczna') }}
                                                <p>{{ $product->tech_card }}</p>
                                            @else
                                                {{ Form::label('tech_card', 'Karta techniczna') }}
                                            @endif
                                            <input type="file" name="tech_card" />
                                        </div>
                                        <div class="form-group">
                                            @if (!empty($product->char_card))
                                                {{ Form::label('char_card', 'Karta charakterystyki') }}
                                                <p>{{ $product->tech_card }}</p>
                                            @else
                                                {{ Form::label('char_card', 'Karta charakterystyki') }}
                                            @endif
                                            <input type="file" name="char_card" />
                                        </div>
                                        <div class="form-group @if ($errors->has('photos')) has-error @endif">
                                            @include('media::shared.files')
                                            @if ($errors->has('photos')) <p class="help-block">{{ $errors->first('photos') }}</p> @endif
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="gallery">
                                        <div class="form-group @if ($errors->has('gallery')) has-error @endif">
                                            {{ Form::label('gallery', 'Galeria') }}
                                            @if(count($product->gallery()) > 0)

                                            @endif
                                            <input id="input-5" type="file" multiple name="gallery[]" class="file-loading" accept="image/*">
                                            @if ($errors->has('gallery')) <p class="help-block">{{ $errors->first('gallery') }}</p> @endif
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="related">
                                        <div class="form-group @if ($errors->has('products_related')) has-error @endif">
                                            {{ Form::label('products_related', 'Powiązane produkty') }}
                                            {{ Form::select('products_related[]', $relatedLists, $product->related()->lists('product_id'), array('class' => 'form-control', 'id' => 'select22', 'multiple' => 'multiple')) }}
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
        CKEDITOR.replace('wysihtml6');
        CKEDITOR.replace('wysihtml7');
        CKEDITOR.replace('wysihtml8');
        $(document).ready(function() {
            $("#select2").select2();
            $("#select22").select2();
            $("#input-5").fileinput({
                @if(count($product->gallery()) > 0)
                    initialPreview: [
                    @foreach($product->gallery as $photo)
                        '{{ renderImage('product_gallery/', $photo->realname, 'teaser') }}',
                    @endforeach
                    ],
                initialPreviewConfig: [
                    @foreach($product->gallery as $k => $photo)
                    @if($k > 0) , @endif
                    {
                        caption: "{{ $photo->name }}",
                        width: '120px',
                        url: "{{ URL::to('admin/product/deletephoto/'.$photo->id.'/'.$product->id) }}",
                        key: {{ $photo->pivot->weight }},
                        extra: {id: {{ $photo->id }}  }
                    }
                    @endforeach
                ],
                @endif
                language: "pl",
                allowedFileExtensions: ["img", "jpg", "png"],
                uploadUrl: "{{ URL::to('admin/product/insertphoto/'.$product->id) }}"

            });
        });
    </script>
@stop