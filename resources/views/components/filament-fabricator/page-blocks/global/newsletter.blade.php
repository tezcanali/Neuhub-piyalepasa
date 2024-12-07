@aware(['page'])
<section class="pressReleases pt120">

    <div class="content">
            @if($title)
                <{{ $headingType ?? 'h1' }}
                    style
                ="color: #BFA474;font-size:45px;font-weight: bold;">
                {!! $title !!}
                </{{ $headingType ?? 'h1' }}>
            @endif

        <style>
            ul li {
                list-style: none !important;
            }
        </style>
        <div class="news-list">
            <ul id="document" data-type="document" class="boxArea">
                @foreach($newsletter as $item)
                <li>
                    <a href="{{ \Illuminate\Support\Facades\Storage::url($item->file) }}" class="document" target="_blank">
                        <i>{{ $item->created_at->format('d-m-Y') }}</i>
                        <strong>{{ $item->title }}</strong>
                        <span class="downloadBtn">PDF</span>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="paginate">
                <ul class="pagination">
                    @php
                        $currentPage = $newsletter->currentPage();
                        $lastPage = $newsletter->lastPage();
                    @endphp

                    {{-- Önceki sayfa --}}
                    @if ($currentPage == 1)
                        <li class="disabled"><span>&laquo;</span></li>
                    @else
                        <li><a href="?page={{ $currentPage - 1 }}">&laquo;</a></li>
                    @endif

                    {{-- Sayfa numaraları --}}
                    @for ($i = 1; $i <= $lastPage; $i++)
                        @if ($i == $currentPage)
                            <li class="active"><span>{{ $i }}</span></li>
                        @else
                            <li><a href="?page={{ $i }}">{{ $i }}</a></li>
                        @endif
                    @endfor

                    {{-- Sonraki sayfa --}}
                    @if ($currentPage == $lastPage)
                        <li class="disabled"><span>&raquo;</span></li>
                    @else
                        <li><a href="?page={{ $currentPage + 1 }}" rel="next">&raquo;</a></li>
                    @endif
                </ul>
            </div>
        </div>


    </div>

</section>
