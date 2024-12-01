@aware(['page'])
<section class="mainSlider">
    <div class="owl-carousel" id="mainSlider">
        @foreach($slides as $slide)
            <div class="item" style="background-image: url({{ Storage::url($slide['background_image']) }});">
                <div class="content">
                    <div class="caption">
                        <h1 style="position: relative;font-size: 42px;line-height:40px;font-weight: bold;margin-bottom: 15px;color:#fff">
                            {!! $slide['title'] !!}<br>
                            <span style="color:#BFA474;font-weight:bold;font-size:38px;">{{ $slide['highlight_text'] }}</span>
                            @if($slide['subtitle'])
                                <span style="color:#BFA474;font-weight:bold;font-size:38px;">{{ $slide['subtitle'] }}</span>
                            @endif
                        </h1>
                        <p>{!! $slide['description'] !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="#" class="scroll"><span></span> <small>SCROLL</small></a>
</section>
