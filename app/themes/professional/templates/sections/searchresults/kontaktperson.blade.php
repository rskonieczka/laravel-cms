<span class="searchlist-info">{{ Lang::get('common.searchresults_count_kontaktperson', array('count' => count($list['kontaktperson']))) }}</span>
<ul class="searchlist">
	@foreach ($list['kontaktperson'] as $item)
		<li class="searchlist-result">
			<article class="search-person">
				<h3>{{ $item->name }}</h3>
				@if(!empty($item->title))
					<span class="title">
                        {{ str_limit(preg_replace('/(<.*?>)|(&.*?;)/', '', str_replace(["<br />","&nbsp;","&oacute;"], [" "," ","ó"], $item->title)), $limit = 300, $end = '...') }}
                    </span>
				@endif
				@if(!empty($item->email))
					<a class="email" href="mailto:{{ $item->email }}">{{ $item->email }}</a>
				@endif
				@if(!empty($item->phone))
					@if(strpos($item->phone, ',') > 0)
						<?php $phones = explode(', ', $item->phone); ?>
					
						<span class="phone">tel.&nbsp;
							@foreach($phones as $phone)
								<a href="tel:{{ $phone }}">{{ $phone }}</a>
							@endforeach
						</span>
					@else
						<span class="phone">tel. <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></span>
					@endif
				@endif
			</article>
		</li>
	@endforeach
</ul>