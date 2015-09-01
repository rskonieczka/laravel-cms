<span class="searchlist-info">{{ Lang::get('common.searchresults_count_text', array('count' => count($list['text']))) }}</span>
<ul class="searchlist">
	@foreach ($list['text'] as $item)
	<li class="searchlist-result">
		<article>
			<h3><a href="{{ URL::to($item->link) }}">{{ $item->title }}</a></h3>
            <p>{{ str_limit(preg_replace('/(<.*?>)|(&.*?;)/', '', str_replace(["<br />","&nbsp;","&oacute;"], [" "," ","ó"], $item->content)), $limit = 300, $end = '...') }}</p>
		</article>
	</li>
	@endforeach
</ul>