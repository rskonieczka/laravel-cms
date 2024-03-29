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
            Lista kategorii
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista kategorii</li>
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
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                    @foreach ($nestable as $k => $n)
                            @foreach (Config::get('app.langs') as $k2 => $n2)
                            <li @if ($k == 1 && $k2 == 0) class="active" @endif>
                                <a href="#{{ Str::snake($n[$n2]['site']->name.'-'.$n2) }}" aria-controls="home" role="tab" data-toggle="tab">{{ $n[$n2]['site']->name }} [{{ $n2 }}]</a>
                            </li>
                            @endforeach
                    @endforeach
                        <li class="pull-right"><a href="{{ URL::route('admin.category.create') }}" class="btn btn-sm btn-flat">Dodaj nową kategorię</a></li>
                    </ul>
                    <div class="tab-content">
                        @foreach ($nestable as $k => $n)
                            @foreach (Config::get('app.langs') as $k2 => $n2)
                            <div class="tab-pane @if ($k == 1 && $k2 == 0) active @endif" id="{{ Str::snake($n[$n2]['site']->name.'-'.$n2) }}">
                                <div class="dd" id="nestable{{ $n[$n2]['site']->id }}-{{ $n2 }}">
                                  {{ $n[$n2]['nestable'] }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->

@stop

@section('extrascripts')
{{ HTML::script('admin/js/plugins/jquery-nestable/jquery.nestable.js') }}
<script type="text/javascript">
    $(document).ready(function() {
        @foreach ($nestable as $n)
        @foreach (Config::get('app.langs') as $k2 => $n2)
         $('#nestable{{ $n[$n2]['site']->id }}-{{$n2}}').nestable({
            dropCallback: function(details) {

               var order = new Array();

               $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
                 order[index] = $(elem).attr('data-id');
               });

               if (order.length === 0){
                var rootOrder = new Array();
                $("#nestable{{ $n[$n2]['site']->id }} > ol > li").each(function(index,elem) {
                  rootOrder[index] = $(elem).attr('data-id');
                });
               }

               $.post('/admin/category/changeorder',
                { source : details.sourceId,
                  destination: details.destId,
                  order:JSON.stringify(order),
                  rootOrder:JSON.stringify(rootOrder)
                },
                function(data) {
                 // console.log('data '+data);
                })
               .done(function() {
                  $( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
               })
               .fail(function() {  })
               .always(function() {  });
             }
           });

          $('label').on('ifChecked', function(){
            var id = $(this).attr('data-idd');
            $.post("/admin/category/hide/"+id);
          });

          $('label').on('ifUnchecked', function(){
            var id = $(this).attr('data-idd');
              $.post("/admin/category/unhide/"+id);
               });
        @endforeach
        @endforeach

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                    if(history.pushState)
                        history.pushState(null, null, '#'+$(e.target).attr('href').substr(1));
                    else
                        location.hash = '#' + $(e.target).attr('href').substr(1);
                });

        if(window.location.hash){
            $('ul.nav-tabs').find('a[href="'+window.location.hash+'"]').tab('show');
        }

    } );
</script>
@stop