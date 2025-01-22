@aware(['page'])
<section class="visualMaterial" id="gorsel-malzemeler">
    <div class="content">
        @if($title)
            <h2>{!! $title !!}</h2>
        @endif
        <div class="news-grid">
            <ul class="boxArea">
                @foreach($files as $item)
                    <li>
                        <a download="{{ \Illuminate\Support\Facades\Storage::url($item['file']) }}"
                           href="{{ \Illuminate\Support\Facades\Storage::url($item['file']) }}">
                            <figure><img src="{{ \Illuminate\Support\Facades\Storage::url($item['image']) }}"
                                         alt="{{ $item['title'] }}" style="width: 100px !important"></figure>
                            <strong style="display: block;width: 100%;">{{ $item['title'] }}</strong>
                            <span class="downloadBtn">{{ $item['buttonTitle'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
