@aware(['page'])
<section class="gallery {{ $sliderClass ?? '' }} {{ $sliderPadding ?? '' }}"
         @if($sliderStyle) style="{{ $sliderStyle }}" @endif>
    <div class="row">
        <div class="col col-11">
            <div class="tabsBtn">
            </div>
        </div>
        <div class="col col-12">
            <div class="tabs-content">
                <div class="tabs">
                    <div class="owl-carousel gallerySlider">
                        @foreach($slides as $slide)
                            <div class="item">
                                <img src="{{ Storage::url($slide['image']) }}" alt="{{ $slide['alt'] ?? '' }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="num">
                        <span>01</span>{{ str_pad(count($slides), 2, '0', STR_PAD_LEFT) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

