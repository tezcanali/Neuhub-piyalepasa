@aware(['page'])
<section class="ourAds" id="reklamlarimiz">
    <div class="content">
        @if($title)
            <h2>{!! $title !!}</h2>
        @endif
        <div class="news-grid">
            <ul class="boxArea">
                @foreach($galleries as $item)
                    <li>
                        <a href="{{ $item['url'] }}" class="modal-open vid">
                            <figure><img src="{{ \Illuminate\Support\Facades\Storage::url($item['image']) }}"
                                         alt="{{ $item['title'] }}"></figure>
                            <p>{{ $item['title'] }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
