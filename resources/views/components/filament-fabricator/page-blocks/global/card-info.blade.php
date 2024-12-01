@aware(['page'])
<section id="{{ $sectionId ?? '' }}">
    @if($title || $highlightText)
        <{{ $headingType ?? 'h6' }} style="font-weight: 500;color:#220728;font-size:40px;margin-bottom:35px;line-height: 1.2em;position:relative;">
        @if($title)
            {!! $title !!}
        @endif
        @if($highlightText)
            <strong style="display:inline;font-weight:bold;color:#BFA474;">{!! $highlightText !!}</strong>
        @endif
</{{ $headingType ?? 'h6' }}>
@endif
    <div class="content whiteBg {{ $cardPadding ?? '' }} {{ $cardClass ?? '' }}" @if($cardStyle) style="{{ $cardStyle }}" @endif>
        <div class="row txtImgContent">
            @foreach($columns as $column)
                <div class="col {{ $column['width'] }}">
                    @if($column['image'])
                        <div>
                            <div class="img">
                                <img src="{{ Storage::url($column['image']) }}">
                            </div>
                        </div>
                    @endif
                        @if($column['title'] || $column['highlightText'] || $column['content'] || $column['buttonText'])
                    <div class="txt pl-5">

                            <{{ $column['headingType'] ?? 'h4' }} style="font-weight: 500;color:#220728;font-size:40px;margin-bottom:35px;line-height: 1.2em">
                                @if($column['title'])
                                    {!! $column['title'] !!}
                                @endif
                                @if($column['highlightText'])
                                    <strong style="color:#BFA474;font-weight:bold;">{!! $column['highlightText'] !!}</strong>
                                @endif
                            </{{ $column['headingType'] ?? 'h4' }}>


                        @if($column['content'])
                            <p>{!! $column['content'] !!}</p>
                        @endif

                        @if($column['buttonText'] && $column['buttonUrl'])
                            <a href="{{ $column['buttonUrl'] }}" class="arrowLink" target="_blank">
                                <span>{{ $column['buttonText'] }}</span>
                            </a>
                        @endif
                    </div>
                @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
