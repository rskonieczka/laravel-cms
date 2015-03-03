@extends('theme::layout.master')

@section('title') Biblioteka mediów @stop

@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Biblioteka mediów
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Biblioteka mediów</li>
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
                        <h3 class="box-title"><small>Lista tekstów dostępna w serwisie</small></h3>
                    </div>
                    <div class="pull-right right-buttons">
                        <a href="{{ URL::route('admin.media.create') }}" class="btn btn-sm btn-flat btn-success">Dodaj nowy plik</a>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="datatable" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                  <th style="width:30px;">id</th>
                                  <th>Podgląd</th>
                                  <th>Nazwa pliku</th>
                                  <th>Typ</th>
                                  <th style="width:130px;">Data utworzenia</th>
                                  <th style="width:70px;">Operacje</th>
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

<div id="modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body" style="text-align:center;">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-url="sdsds" data-dismiss="modal">Zamknij</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop

@section('extrascripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable( {
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::route('admin.media.datatable') }}",
            "fnDrawCallback": function () {
                laravel.initialize();
                $( "table tr td div#geturl" ).on( "click", function(e) {
                    var img = '<img src="'+$(this).attr('data-url')+'" />';
                    var title = $(this).closest('tr').find('td:nth-child(3)').text();
                    $('.modal .modal-title').text(title);
                    $('.modal .modal-body').html(img);
                    $('.modal .modal-body').append('<br /><br /><p class="text-center"><strong>Adres obrazka:</strong> <a href="'+$(this).attr('data-url')+'">'+$(this).attr('data-url')+'</a></p>');
                    $('#modal').modal('show');
                });

             },
             "language": {
                 "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
             },
            "order": [[4,'desc']]
        } );


    } );



</script>
@stop