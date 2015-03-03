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
            Lista użytkowników
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista użytkowników</li>
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
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-info"></i>
                        <h3 class="box-title"><small>Lista tekstów dostępna w serwisie</small></h3>
                    </div>
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.user.create') }}" class="btn btn-sm btn-flat btn-success">Dodaj nowego użytkownika</a>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="datatable" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                  <th style="width:30px;">id</th>
                                  <th>Imię</th>
                                  <th>Nazwisko</th>
                                  <th>E-mail</th>
                                  <th>Grupa</th>
                                  <th style="width:150px;">Ostatnie logowanie</th>
                                  <th style="width:130px;">Data rejestracji</th>
                                  <th style="width:100px;">Aktywny</th>
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
            "sAjaxSource": "{{ URL::route('admin.user.datatable') }}",
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