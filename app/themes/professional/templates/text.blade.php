@extends('theme::layout.master')

@section('template')
	<div id="content">
		<div class="container-fluid">
			@include('theme::includes.breadcrumbs')
			@include('theme::includes.leftsidebar')
			<div id="main-content">
				@if (count($category->texts) > 0)
					@foreach ($category->texts as $k => $text)
						<article class="text-content">
							<h1>{{ $text->title }}</h1>
							{{ $text->content }}
						</article>
					@endforeach
				@endif
			</div>
		</div>
	</div>
@stop