<div class="row">
    <div class="col-md-6 col-xs-12">
        {{ Form::label('filess', 'Wybierz pliki') }}
        <div class="box box-default">
            <div class="box-body table-responsive small-table">
                <table id="datatable" class="table table-bordered table-hover dataTable table-condensed">
                    <thead>
                    <tr>
                        <th style="width:30px;">id</th>
                        <th>Nazwa pliku</th>
                        <th>Typ</th>
                        <th style="width:130px;">Data utworzenia</th>
                        <th style="width:20px;">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        {{ Form::label('filess', 'Pliki') }}
        <div class="box box-default">
            <div class="callout callout-info" style="padding:3px 30px 3px 15px; font-size: 12px;">
                <p>Przy pomocy wagi ustaw kolejność zdjęć w galerii</p>
            </div>
            <div class="box-body table-responsive small-table" style="padding:0;">
                <table id="selectedItems" class="table table-bordered table-hover dataTable table-condensed">
                    <thead>
                    <tr><th>Nazwa pliku</th><th>Kolejność</th><th style="width:20px;">&nbsp;</th></tr>
                    </thead>
                    <tbody>
                    @if (isset($mediaListData))
                        @foreach ($mediaListData as $k => $item)
                            <tr>
                                <td>{{ $item->name }}<br />
                                    <br /><input type="text" placeholder="Tytuł" class="form-control" name="files[{{ $item->id }}][title]" value="{{ $item->pivot->title }}" />
                                    <input type="hidden" name="files[{{ $item->id }}][media_id]" value="{{ $item->id }}">
                                </td>
                                <td><br /><br /><input type="text" name="files[{{ $item->id }}][weight]" class="form-control" value="{{ $item->pivot->weight }}" style="width:40px;"></td>
                                <td><button class="btn btn-flat btn-sm btn-danger" onclick="deleteRow(this)" style="padding:1px 5px;"><i class="fa fa-times"></i></button></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
@section('extrascripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable( {
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::route('admin.media.datatablefiles', array('selectable')) }}",
                "fnDrawCallback": function () {
                    laravel.initialize();

                    $("table#datatable tr td button#add").on('click', function(e){
                        e.preventDefault();
                        var tr = $(this).closest('tr');
                        var id = tr.find('td:nth-child(1)').text();
                        var nameCell = tr.find('td:nth-child(2)').html();
                        var deleteButton = "<button class='btn btn-flat btn-sm btn-danger' onclick='deleteRow(this)' style='padding:1px 5px;'><i class=\"fa fa-times\"></i></button>";
                        var formElement = '<input type="hidden" name="files['+id+'][media_id]" value="'+id+'" />';
                        var tableRow = '<tr><td>'+nameCell+formElement+'<br />' +
                                '<br /><input type="text" placeholder="Tytuł" class="form-control" name="files['+id+'][title]" />'+
                                '<td><br /><br /><input type="text" name="files['+id+'][weight]" class="form-control" style="width:40px;" value="0" /><br /></td>' +
                                '<td>'+deleteButton+'</td></tr>';
                        $(tableRow).appendTo("#selectedItems tbody");
                    });



                },
                "order": [[4,'desc']]
            } );

        } );

        function deleteRow(e)
        {
            e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
        }
    </script>
@stop