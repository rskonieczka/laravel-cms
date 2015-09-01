@extends('theme::layout.master')

@section('title') Dodawanie tekstu @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dodawanie nowego pliku
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

                    {{ Form::open(array('route' => 'admin.media.store', 'files'=> true)) }}
                    {{ Form::token() }}
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.media.index') }}" class="btn btn-sm btn-flat btn-primary">Wróć do listy</a>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title"><small>informacje na temat dodawania nowego tekstu</small></h3>
                        </div>
                        <div class="form-group">
                            {{ Form::label('file', 'Plik') }}
                            {{ Form::file('files[]', array('class' => 'form-control', 'id' => 'input-5', 'multiple', 'class' => 'file-loading') ) }}
                        </div>

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
    $("#input-5").fileinput({language: "pl"});
</script>
@stop