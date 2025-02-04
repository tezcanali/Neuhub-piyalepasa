@aware(['page'])
<section class="{{ $sectionClass ?? '' }}" @if($sectionStyle) style="{{ $sectionStyle }}" @endif>
    <div class="content">
        <div class="row">
            <div class="col col-5 pr-40">
                <a href="{{ Storage::url($planImage) }}" data-fancybox="" class="konutTeaserLink brown">
                    <span class="txt">
                        <small>{{ $planTitle ?? 'Yerleşim' }}<br></small>
                        <p style="font-size:17px">{{ $planSubtitle ?? 'Yerleşim planını görüntüleyin.' }}</p>
                        <i></i>
                    </span>
                </a>
            </div>
            <div class="col col-3">
                <a href="{{ Storage::url($mahalPdf) }}" target="_blank" class="konutTeaserLink">
                    <span class="txt">
                        <small>{{ $mahalTitle ?? 'Mahal' }}</small>
                        <i></i>
                    </span>
                    <span class="img">
                        <img src="{{ Storage::url($mahalImage) }}" alt="{{ $mahalTitle ?? 'Mahal Listesi' }}">
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
