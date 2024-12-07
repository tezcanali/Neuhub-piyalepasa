@aware(['page'])
<section class="news">
    <div class="content">
        @if($title)
            <{{ $headingType ?? 'h1' }}
                style
            ="position:relative;font-size:40px;font-weight:bold;color: #220728;line-height: 1.2;letter-spacing:
        -0.05em;margin-bottom: 20px;">
            {!! $title !!}

            </{{ $headingType ?? 'h1' }} >

            @endif

            <style>
            ul li {
                list-style: none !important;
            }
            </style>
            <div class="news-list news">
                <ul id="news" data-type="news" class="boxArea">
                    @foreach($news as $item)
                        <li>
                            <a href="{{ Storage::url($item->getTranslation('image', $language)) }}"
                               title="{{ $item->getTranslation('title', $language) }}">
                                <div class="img">
                                    <img src="{{ Storage::url($item->getTranslation('image', $language)) }}"
                                         alt="{{ $item->getTranslation('title', $language) }}">
                                </div>
                                <div class="right">
                                    <i>{{ $item->created_at->format('d-m-Y') }}</i>
                                    <strong>{{ $item->getTranslation('title', $language) }}</strong>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div id="paging">
                    @php
                        $currentPage = $news->currentPage();
                        $lastPage = $news->lastPage();
                    @endphp

                    {{-- Önceki sayfa --}}
                    @if ($currentPage == 1)
                        <a href="javascript:void(0)" style="font-weight:700;"><</a>
                    @else
                        <a href="?page={{ $currentPage - 1 }}" style="font-weight:700;"><</a>
                    @endif

                    {{-- Sayfa numaraları --}}
                    @for ($i = 1; $i <= $lastPage; $i++)
                        @if ($i == $currentPage)
                            <a href="javascript:void(0)" class="aktif">{{ $i }}</a>
                        @else
                            {{-- İlk 7 sayfa her zaman görünür --}}
                            @if ($i <= 7)
                                <a href="?page={{ $i }}">{{ $i }}</a>
                            @else
                                {{-- 7'den sonraki sayfalar hidden class'ı alır --}}
                                <a href="?page={{ $i }}" class="hidden">{{ $i }}</a>
                            @endif
                        @endif
                    @endfor

                    {{-- Sonraki sayfa --}}
                    @if ($currentPage == $lastPage)
                        <a href="javascript:void(0)" style="font-weight:700;">></a>
                    @else
                        <a href="?page={{ $currentPage + 1 }}" style="font-weight:700;">></a>
                    @endif
                </div>

            </div>
    </div>
</section>
