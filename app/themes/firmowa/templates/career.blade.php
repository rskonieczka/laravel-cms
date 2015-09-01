@extends('theme::layout.master')

@section('template')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            {{ $category->breadcrumbs }}
        </div>
    </div>
    <section class="section-content" id="career">
        <div class="container-fluid">
			<h1>Aktualnie poszukujemy</h1>
			@if($category->texts)
				@foreach ($category->texts as $k => $text)
					<article>
						<h2>{{ $text->title }}</h2>
						{{ $text->content }}
					</article>
				@endforeach
			@else
				<span class="career-list-empty">W tej chwili brak nowych ofert</span>
			@endif
        </div>
    </section>
    @include('theme::templates.sections.common.rewards')
@stop