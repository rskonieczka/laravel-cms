@extends('theme::layout.master')

@section('template')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            {{ $category->breadcrumbs }}
        </div>
    </div>
    <section class="section-content search-content search-results-content">
        <div class="container-fluid">
			<h2 class="searchlist-headline">{{ Lang::get('common.searchresults_title', array('query' => $query)) }}</h2>
		</div>
		<?php $countNotEmpty = 0; ?>
		@foreach ($list as $key => $item)
			@if(count($item) > 0)
				<?php $countNotEmpty++; ?>
			@endif
		@endforeach
		@if($countNotEmpty === 0)
			<div class="container-fluid">
				<span class="searchlist-info">{{ Lang::get('common.searchresults_count_all', array('count' => 0)) }}</span>
			</div>
		@endif
		<div class="search-results-desktop">
			@if($countNotEmpty > 1)
				<div class="search-results-menu">
					<div class="container-fluid">
						<ul class="list-unstyled" role="tablist">
							@if (count($list['kontaktperson']) > 0)
								<li class="active"><a href="#search-persons" role="tab" data-toggle="tab">{{ Lang::get('common.searchresults_kontaktperson') }}</a></li>
							@endif
							@if(count($list['text']) > 0)
								<li @if(count($list['kontaktperson']) === 0) class="active" @endif><a href="#search-text" role="tab" data-toggle="tab">{{ Lang::get('common.searchresults_text') }}</a></li>
							@endif
							@if (count($list['post']) > 0)
								<li @if(count($list['kontaktperson']) === 0 && count($list['text']) === 0) class="active" @endif><a href="#search-posts" role="tab" data-toggle="tab">{{ Lang::get('common.searchresults_posts') }}</a></li>
							@endif
							@if (count($list['knowledge']) > 0)
								<li @if(count($list['kontaktperson']) === 0 && count($list['text']) === 0 && count($list['post']) === 0) class="active" @endif><a href="#search-knowledge" role="tab" data-toggle="tab">{{ Lang::get('common.searchresults_knowledge') }}</a></li>
							@endif
						</ul>
					</div>
				</div>
				<div class="tab-content">
					@if (count($list['kontaktperson']) > 0)
						<div id="search-persons" role="tabpanel" class="tab-pane active">
							<div class="container-fluid">
								@include('theme::templates.sections.searchresults.kontaktperson')
							</div>
						</div>
					@endif
					@if(count($list['text']) > 0)
						<div id="search-text" role="tabpanel" class="tab-pane @if(count($list['kontaktperson']) === 0) active @endif">
							<div class="container-fluid">
								@include('theme::templates.sections.searchresults.text')
							</div>
						</div>
					@endif
					@if (count($list['post']) > 0)
						<div id="search-posts" role="tabpanel" class="tab-pane @if(count($list['kontaktperson']) === 0 && count($list['text']) === 0) active @endif">
							<div class="container-fluid">
								@include('theme::templates.sections.searchresults.posts')
							</div>
						</div>
					@endif
					@if (count($list['knowledge']) > 0)
						<div id="search-knowledge" role="tabpanel" class="tab-pane @if(count($list['kontaktperson']) === 0 && count($list['text']) === 0 && count($list['post']) === 0) active @endif">
							<div class="container-fluid">
								@include('theme::templates.sections.searchresults.knowledge')
							</div>
						</div>
					@endif
				</div>
			@elseif($countNotEmpty === 1)
				@if(count($list['kontaktperson']) > 0)
					<div class="container-fluid">
						@include('theme::templates.sections.searchresults.kontaktperson')
					</div>
				@endif
				@if(count($list['text']) > 0)
					<div class="container-fluid">
						@include('theme::templates.sections.searchresults.text')
					</div>
				@endif
				@if(count($list['post']) > 0)
					<div class="container-fluid">
						@include('theme::templates.sections.searchresults.posts')
					</div>
				@endif
				@if(count($list['knowledge']) > 0)
					<div class="container-fluid">
						@include('theme::templates.sections.searchresults.knowledge')
					</div>
				@endif
			@endif
		</div>
		@if($countNotEmpty > 0)
			<div class="container-fluid">
				<ul class="slide-list">
					@if(count($list['kontaktperson']) > 0)
						<li class="active">
							<span class="name">{{ Lang::get('common.searchresults_kontaktperson') }}</span>
							<div class="slide-list-items" style="display: block;">
								@include('theme::templates.sections.searchresults.kontaktperson')
							</div>
						</li>
					@endif
					@if(count($list['text']) > 0)
						<li @if(count($list['kontaktperson']) === 0) class="active" @endif>
							<span class="name">{{ Lang::get('common.searchresults_text') }}</span>
							<div class="slide-list-items" @if(count($list['kontaktperson']) === 0) style="display: block;" @endif>
								@include('theme::templates.sections.searchresults.text')
							</div>
						</li>
					@endif
					@if(count($list['post']) > 0)
						<li @if(count($list['kontaktperson']) === 0 && count($list['text']) === 0) class="active" @endif>
							<span class="name">{{ Lang::get('common.searchresults_posts') }}</span>
							<div class="slide-list-items" @if(count($list['kontaktperson']) === 0 && count($list['text']) === 0) style="display: block;" @endif>
								@include('theme::templates.sections.searchresults.posts')
							</div>
						</li>
					@endif
					@if(count($list['knowledge']) > 0)
						<li @if(count($list['kontaktperson']) === 0 && count($list['text']) === 0 && count($list['post']) === 0) class="active" @endif>
							<span class="name">{{ Lang::get('common.searchresults_knowledge') }}</span>
							<div class="slide-list-items" @if(count($list['kontaktperson']) === 0 && count($list['text']) === 0 && count($list['post']) === 0) style="display: block;" @endif>
								@include('theme::templates.sections.searchresults.knowledge')
							</div>
						</li>
					@endif
				</ul>
			</div>
		@endif
    </section>
    @include('theme::templates.sections.common.rewards')
@stop