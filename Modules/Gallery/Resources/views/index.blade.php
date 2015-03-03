@extends('theme::layout.master')

@section('title') Lista kategorii @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Galerie
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Galerie</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- small box -->
                @if ( Session::get('message'))
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Sukces!</b> {{  Session::get('message') }}
                    </div>
                @endif
                {{ $error = Session::get('error') }}

                @if ($errors->has())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Błąd!</b> {{ $error }}
                        </div>
                    @endforeach
                @endif

                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-info"></i>
                        <h3 class="box-title"><small>Lista galerii dostępnych w serwisie</small></h3>
                    </div>
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.gallery.create') }}" class="btn btn-sm btn-flat btn-success">Dodaj nową galerię</a>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="datatable" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                  <th style="width:30px;">id</th>
                                  <th>Nazwa pliku</th>
                                  <th>Klucz</th>
                                  <th>Kategoria</th>
                                  <th style="width:130px;">Data utworzenia</th>
                                  <th style="width:120px;">Operacje</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->

@stop

@section('extrascripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable( {
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::route('admin.gallery.datatable') }}",
            "fnDrawCallback": function () {
                laravel.initialize();

             },
             "language": {
                 "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
             },
            "order": [[4,'desc']]
        } );


    } );



</script>
@stop