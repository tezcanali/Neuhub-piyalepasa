@aware(['page'])
<section id="{{ $sectionId ?? '' }}">
    <div class="content">
        <div class="row">
            @foreach($cards as $card)
                <div class="col col-4" style="padding:10px">
                    <a href="{{ $card['url'] }}" class="teaserLink">
                        <span class="img">
                            <img src="{{ Storage::url($card['image']) }}" style="height:285px">
                        </span>
                        <span class="txt">
                            <small>{!! $card['title'] !!}</small>
                            <i></i>
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
