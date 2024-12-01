@aware(['page'])
<section class="plan {{ $sectionClass ?? '' }}" id="{{ $sectionId ?? 'plans' }}" @if($sectionStyle) style="{{ $sectionStyle }}" @endif>
    <div class="content">
        @if($title)
            <{{ $headingType ?? 'h2' }} style="width:100%;">{{ $title }}</{{ $headingType ?? 'h2' }}>
        @endif
        <div class="left">
            <div class="planImgList">
                @foreach($planCategories as $category)
                    @foreach($category['plans'] as $index => $plan)
                        <a href="{{ Storage::url($plan['image']) }}" data-fancybox
                           id="plan{{ $loop->parent->index }}_{{ $index }}">
                            <img src="{{ Storage::url($plan['image']) }}" alt="{{ $plan['name'] }}">
                        </a>
                    @endforeach
                @endforeach
            </div>
            <br>
            <a class="arrowLink downloadplan" href="{{ Storage::url($planCategories[0]['plans'][0]['image'] ?? '') }}" download>
                Planı İndir
            </a>
        </div>
        <div class="right">
            <h3><img src="{{asset('front/images/house.svg')}}"> KONUT</h3>
            <div class="planList">
                <div class="planCategory">
                    @foreach($planCategories as $index => $category)
                        <a class="plantab{{ $index + 1 }}" href="javascript:;">{{ $category['name'] }}</a>
                    @endforeach
                </div>
                <div class="planTypes">
                    @foreach($planCategories as $categoryIndex => $category)
                        <div>
                            @foreach($category['plans'] as $planIndex => $plan)
                                <a data-href="plan{{ $categoryIndex }}_{{ $planIndex }}" @if($loop->parent->first && $loop->first) class="selected" @endif>
                                    {{ $plan['name'] }}
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Plan kategorisi değiştiğinde
        @foreach($planCategories as $categoryIndex => $category)
            document.querySelector(".plantab{{ $categoryIndex + 1 }}").addEventListener('click', function() {
                // İndirme linkini güncelle
                document.querySelector(".downloadplan").href = "{{ Storage::url($category['plans'][0]['image'] ?? '') }}";

                // Seçili sınıfını güncelle
                document.querySelectorAll('.planCategory a').forEach(tab => tab.classList.remove('selected'));
                this.classList.add('selected');

                // İlgili plan listesini göster
                document.querySelectorAll('.planTypes > div').forEach(div => div.style.display = 'none');
                document.querySelectorAll('.planTypes > div')[{{ $categoryIndex }}].style.display = 'block';

                // İlk planı seç ve görselini göster
                const firstPlanLink = document.querySelectorAll('.planTypes > div')[{{ $categoryIndex }}].querySelector('a');
                if (firstPlanLink) {
                    firstPlanLink.click();
                }
            });
        @endforeach

        // Plan seçildiğinde
        @foreach($planCategories as $categoryIndex => $category)
            @foreach($category['plans'] as $planIndex => $plan)
                document.querySelector("a[data-href='plan{{ $categoryIndex }}_{{ $planIndex }}']").addEventListener('click', function() {
                    // İndirme linkini güncelle
                    document.querySelector(".downloadplan").href = "{{ Storage::url($plan['image']) }}";

                    // Seçili sınıfını güncelle
                    document.querySelectorAll('.planTypes a').forEach(plan => plan.classList.remove('selected'));
                    this.classList.add('selected');

                    // Görseli güncelle
                    document.querySelectorAll('.planImgList a').forEach(img => img.style.display = 'none');
                    document.querySelector('#plan{{ $categoryIndex }}_{{ $planIndex }}').style.display = 'block';
                });
            @endforeach
        @endforeach

        // Sayfa yüklendiğinde ilk planı seç
        if (document.querySelector('.planCategory a')) {
            document.querySelector('.planCategory a').click();
        }
    });
</script>
