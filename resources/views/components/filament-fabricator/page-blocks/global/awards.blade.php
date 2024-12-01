@aware(['page'])
<section id="{{ $sectionId ?? 'odullerimiz' }}" class="{{ $sectionClass ?? '' }}" @if($sectionStyle) style="{{ $sectionStyle }}" @endif>
    <div class="content">
        @if($title)
            <{{ $headingType ?? 'h2' }}>{{ $title }}</{{ $headingType ?? 'h2' }}>
        @endif
        <div class="news-list">
            <ul class="boxArea prices">
                @foreach($awards as $award)
                    <li>
                        <div class="odul">
                            <div class="img">
                                <img src="{{ Storage::url($award['image']) }}" 
                                     alt="{{ $award['title'] }}" />
                                <strong>{{ $award['title'] }}</strong>
                            </div>
                            <div class="right">
                                <span>{{ $award['description'] }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
