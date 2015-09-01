@extends('theme::layout.master')

@section('template')
    @include('theme::templates.sections.home.slider')
    @include('theme::templates.sections.home.brands')
    @include('theme::templates.sections.home.movie')
    @include('theme::templates.sections.home.news')
    @include('theme::templates.sections.home.knowledge')
    @include('theme::templates.sections.home.contact_'.App::getLocale())
    @include('theme::templates.sections.common.rewards')
@stop


@section('extrascripts')
	{{ HTML::script('assets/firmowa/js/home.js') }}
	{{ HTML::script('assets/firmowa/js/map.js') }}
@stop