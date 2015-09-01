<span class="searchlist-info">{{ Lang::get('common.searchresults_count_post', array('count' => count($list['post']))) }}</span>
<ul class="searchlist">
	@foreach ($list['post'] as $item)
		<li class="searchlist-result">
			<article>
				<h3><a href="{{ URL::to($item->link) }}">{{ $item->title }}</a></h3>
				<p>{{ str_limit(preg_replace('/(<.*?>)|(&.*?;)/', '', $item->content), $limit = 300, $end = '...') }}</p>
			</article>
		</li>
	@endforeach
</ul>