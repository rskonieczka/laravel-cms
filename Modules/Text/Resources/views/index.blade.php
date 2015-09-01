@extends('theme::layout.master')

@section('title') Lista kategorii @stop

@section('content')
{{ $error = Session::get('error') }}

@if ($errors->has())
    @foreach ($errors->all() as $error)
        <div class='bg-danger alert'>{{ $error }}</div>
    @endforeach
@endif

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista tekstów
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista tekstów</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-3">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kategorie</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-group" id="accordion">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            @foreach (Config::get('app.langs_keys') as $k => $n)
                                <div class="panel box">
                                    <div class="box-header with-border">
                                        <h5>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$k}}" aria-expanded="false" class="collapsed">
                                                &nbsp;&nbsp;<strong>{{ $k }}</strong>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse{{$k}}" class="panel-collapse collapse @if(isset($lang) && $lang == $n) in @endif" aria-expanded="false">
                                        <div class="box-body">
                                            @foreach ($categories as $k2 => $n2)
                                                <h4>{{ $n2[$n]['site']->name }}</h4>
                                                {{ $n2[$n]['nestable'] }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>
            <div class="col-xs-9">
                <!-- small box -->
                @if ( Session::get('message'))
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Sukces!</b> {{  Session::get('message') }}
                    </div>
                @endif
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-info"></i>
                        <h3 class="box-title"><small>Lista tekstów dostępna w serwisie</small></h3>
                    </div>
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.text.create') }}" class="btn btn-sm btn-flat btn-success">Dodaj nowy tekst</a>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="datatable" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                  <th style="width:30px;">id</th>
                                  <th>Kategoria</th>
                                  <th>Tytuł</th>
                                  <th>Klucz</th>
                                  <th style="width:100px;">Waga</th>
                                  <th style="width:130px;">Utworzono</th>
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
            "sAjaxSource": "{{ URL::to('admin/text/datatable/'.$categoryId) }}",
            "fnDrawCallback": function () {
                laravel.initialize();
             },
             "language": {
                 "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
             },
             "order": [[1,'asc'], [4,'asc']]
        } );
    } );
</script>
@stop