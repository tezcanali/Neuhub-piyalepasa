@aware(['page'])
<div class="breadcrumb">
    @foreach($breadcrumbs as $item)
        @if($loop->last)
            <a>{{ $item['title'] }}</a>
        @else
            <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
        @endif
    @endforeach
</div>
