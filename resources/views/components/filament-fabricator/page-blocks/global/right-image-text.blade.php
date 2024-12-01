@aware(['page'])
<section id="{{ $sectionId ?? '' }}">
    <div class="content">
        <div class="row txtImgContent">
            @if($imagePosition === 'right')
                <div class="col col-4">
                    <div class="txt pr-5">
                        <{{ $headingType ?? 'h1' }} style
                            ="position:relative;font-size:50px;font-weight:500;color: #220728;line-height: 1.2;letter-spacing:
                    -0.05em;margin-bottom: 20px;">
                            @if($title)
                                {{ $title }}
                            @endif
                            @if($highlightText1)
                                <strong
                                    style="color: #BFA474;font-size:40px;font-weight: 500;">{{ $highlightText1 }}</strong>
                            @endif
                        </{{ $headingType ?? 'h1' }}>

                        @if($content)
                            <p>{!! $content !!}</p>
                        @endif

                        @if($button)
                            <a href="{{ $buttonUrl }}" class="arrowLink"><span>{{ $button }}</span></a>
                        @endif

                    </div>
                </div>
                <div class="col col-4">
                    @if($image)
                        <div class="imgWithBoxes">
                            <div class="img">
                                <img src="{{ Storage::url($image) }}">
                                @if(isset($links) && count($links) > 0)
                                    <div class="links">
                                        @foreach($links as $link)
                                            <a href="{{ $link['url'] }}"
                                               target="_blank"><span>{{ $link['text'] }}</span></a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <i></i>
                        </div>
                    @endif
                </div>
            @else
                <div class="col col-4">
                    @if($image)
                        <div class="imgWithBoxes">
                            <div class="img">
                                <img src="{{ Storage::url($image) }}">
                                @if(isset($links) && count($links) > 0)
                                    <div class="links">
                                        @foreach($links as $link)
                                            <a href="{{ $link['url'] }}"
                                               target="_blank"><span>{{ $link['text'] }}</span></a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <i></i>
                        </div>
                    @endif
                </div>
                <div class="col col-4" style="padding-left:15px;">
                    <div class="txt pl-5">
                        <{{ $headingType ?? 'h1' }} style
                            ="position:relative;font-size:50px;font-weight:500;color: #220728;line-height: 1.2;letter-spacing:
                    -0.05em;margin-bottom: 20px;">
                            @if($title)
                                {{ $title }}
                            @endif
                            @if($highlightText1)
                                <strong
                                    style="color: #BFA474;font-size:40px;font-weight: 500;">{{ $highlightText1 }}</strong>
                            @endif
                        </{{ $headingType ?? 'h1' }}>

                        @if($content)
                            <p>{!! $content !!}</p>
                        @endif

                        @if($button)
                            <a href="{{ $buttonUrl }}" class="arrowLink"><span>{{ $button }}</span></a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
