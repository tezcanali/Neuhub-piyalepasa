@aware(['page'])
<section id="proje-fotograflari" class="projectPhotos">
    <div class="content">
        @if($title)
            <h2>{{ $title }}</h2>
        @endif
        <div class="construction">

            <div class="image-grid">
                <ul class="groupul">
                    @foreach($images as $item)
                        <li>
                            <a href="{{ \Illuminate\Support\Facades\Storage::url($item['image']) }}"
                               class="zoom-open zoom-gallery construct-img"><img
                                    src="{{ \Illuminate\Support\Facades\Storage::url($item['image']) }}"
                                    alt="{{ $item['alt_tag'] }}" /></a>
                        </li>
                    @endforeach
                </ul>
                <div class="clear"></div>

            </div>
            <div class="text-center">
                <a class="more icon-arrow-down">daha fazla fotoğraf göster</a>
            </div>
        </div>

    </div>
</section>
