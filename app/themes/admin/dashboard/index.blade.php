@extends('theme::layout.master')

@section('title') Users list @stop

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
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- small box -->
                <div class="box">
                    <div class="box-body table-responsive">
                        Dasboard view
                    </div>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->

@stop