<span class="searchlist-info">{{ Lang::get('common.searchresults_count_knowledge', array('count' => count($list['knowledge']))) }}</span>
<ul class="searchlist">
	@foreach ($list['knowledge'] as $item)
		<li class="searchlist-result">
			<article>
				<h3><a href="{{ URL::to($item->link) }}">{{ $item->title }}</a></h3>
				<p>{{ str_limit(preg_replace('/(<.*?>)|(&.*?;)/', '', $item->content), $limit = 300, $end = '...') }}</p>
			</article>
		</li>
	@endforeach
</ul>