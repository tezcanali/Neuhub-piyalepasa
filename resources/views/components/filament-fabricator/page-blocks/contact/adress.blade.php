@aware(['page'])
<section class="contact">
    <div class="row">
        <div class="col col-4 leftArea">
            <div class="info">
                @if($title)
                    <h1 style="position:relative;font-size:50px;font-weight:400;color: #220728;line-height: 1.2;letter-spacing: -0.05em;margin-bottom: 20px;">
                        {!! $title !!}
                    </h1>
                @endif
                @foreach($offices as $office)
                    <h2>{{ $office['title'] }}</h2>
                    <p class="">{!! $office['address'] !!}</p>
                    <p class=""><a href="mailto:{{ $office['email'] }}">{{ $office['email'] }}</a></p>
                    <p><a href="tel:{{ $office['phone'] }}">{{ $office['phone'] }}</a></p>
                    @if(isset($office['mobile']))
                        <p class=""><a href="tel:{{ $office['mobile'] }}">{{ $office['mobile'] }}</a></p>
                    @endif
                    <p><a href="{{ $yolTarif }}" class="arrowBtn"><span>YOL TARİFİ</span></a></p>
                    <br><br>
                @endforeach
            </div>
        </div>

        <div class="col col-4 rightArea">
            <div class="map">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($image) }}">

                <div class="contactNav">
                    <ul>
                        @foreach($locations as $location)
                            <li>
                                <small>{{ $location['name'] }}</small>
                                <span>{{ $location['duration'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
