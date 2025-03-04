@php
    use Datlechin\FilamentMenuBuilder\Models\Menu;
    $locale = app()->getLocale();
    $web_menu = Menu::location('header');
    $web_menu_en = Menu::location('headeren');
    $settings = \Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting::find(1);
@endphp
<header>
    <div class="content">
        <a href="./" class="logo"></a>
        <div class="navTools">
            <a class="headertel" href="tel:+902122120404">0 212 212 04 04 </a>

            <a href="https://polatpiyalepasacarsi.com/"><span>
                    <img style="margin:0;" src="{{asset('front/images/yeni-image.webp')}}"></span></a>

            <a href="{{asset('front/premium-theme/image/Ocak2025-timelapse.mp4')}}" data-fancybox><span><img
                        src="{{asset('front/premium-theme/images/icons/timelapse.svg')}}"><small>TIME LAPSE</small></span></a>

            <a data-fancybox="gallery" href="https://www.youtube.com/embed/8MxhPo-wsfY?autoplay=1">
                    <span><img src="{{asset('front/premium-theme/images/icons/timelapse.svg')}}">
                        <small>SANAL TUR</small>
                    </span>
            </a>


            <a href="{{asset('front/premium-theme/media/Piyalepasa_Premium_Katalog.pdf')}}" target="_blank"><span><img
                        src="{{asset('front/premium-theme/images/icons/catalogue.svg')}}"
                        style="display:block; width:36px;"><small>@lang('header.catalog')</small></span></a>

            <a href="./en"><span><img
                        src="{{asset('front/premium-theme/images/icons/lang.svg')}}"><small>EN</small></span></a>

            <a href="javascript:;" class="menuLink">
                <div class="menuLinkContent">
                    <span class="line1"></span>
                    <span class="line2"></span>
                    <span class="line3"></span>
                    <small>MENU</small>
                </div>

            </a>
        </div>
    </div>

    <nav>
        <div class="left">
            <ul class="with-customer">
                @if($locale == "en")
                    @foreach($web_menu_en->menuItems as $item)
                        @if($item->children->isNotEmpty())
                            <li>
                                <a href="javascript:;" title="{{ $item->title }}">{{ $item->title }}</a>
                                <ul>
                                    @foreach($item->children as $child)
                                        <li>
                                            <a href="{{ $child->url }}" title="{{ $child->title }}">{{ $child->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ $item->url }}">{{ $item->title }}</a>
                            </li>
                        @endif
                    @endforeach
                @elseif($locale == "tr")
                    @foreach($web_menu->menuItems as $item)
                        @if($item->children->isNotEmpty())
                            <li>
                                <a href="javascript:;" title="{{ $item->title }}">{{ $item->title }}</a>
                                <ul>
                                    @foreach($item->children as $child)
                                        <li>
                                            <a href="{{ $child->url }}" title="{{ $child->title }}">{{ $child->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ $item->url }}">{{ $item->title }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif

            </ul>
        </div>

        <div class="right">
            <div class="rightInner">
                <p style="font-weight:bold;">@lang('header.contact')</p>
                <a class="phone-link" href="tel:+902122120404">+90 212 212 04 04</a>
                <p style="font-weight:bold;">@lang('header.promotional_movie')</p>
                <a href="https://www.youtube.com/watch?v=3ZOUBVI4xiI" data-fancybox class="videoLink"><img
                        src="{{asset('front/premium-theme/images/img/video.jpg')}}"></a>
                <div class="social">
                    @foreach($settings->social_network as $platform => $url)
                        @if($url !== null)
                    <a href="{{ $url }}" target="_blank" rel="noopener"
                       class="icon-{{ $platform }}{{ $platform === 'youtube' ? '-play' : '-1' }}"></a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</header>

<aside>

    <div class="content">
        <a href="./en/" class="showOnMobile"><span><img
                    src="{{asset('front/premium-theme/images/icons/lang.svg')}}"><small>EN</small></span></a>

        <a href="{{asset('front/premium-theme/media/Piyalepasa_Premium_Katalog.pdf')}}" class="showOnMobile"
           target="_blank"><span><img
                    src="{{asset('front/premium-theme/images/icons/catalogue.svg')}}"><small>@lang('header.catalog')</small></span></a>
        <a href="https://api.whatsapp.com/send?phone=905338139090&text=" target="_blank"><span><img
                    src="{{asset('front/premium-theme/images/icons/whatsapp.svg')}}"><small>@lang('header.whatsapp')</small></span></a>
        <a href="#" class="callForm"><span><img src="{{asset('front/premium-theme/images/icons/form.svg')}}"><small>@lang('header.call')</small></span></a>
    </div>

    <div id="talep-formu">
        <div class="formkapatclass">
            <a href="javascript:;" class="callForm btn">X</a>
        </div>
        <div class="formContent">
            <div class="codeFormData">
                <p class="info">@lang('header.form1') <span>@lang('header.form2') </span></p>
                <a class="closeFormData"
                   style="display: block; width: 40px; height: 40px; text-align: center; line-height: 40px; cursor: pointer; position: absolute; right: 0px; top: 0px;">×</a>
                <form class="phoneValidate" action="/sms-submit">
                    <div class="fRow">
                        <div class="fCol input">
                            <div class="element"><input type="text" name="code" minlength="4"
                                                        placeholder="@lang('header.form_code')"/></div>
                            <input type="hiden" style="display: none;" name="phone"/>
                            <input type="hiden" style="display: none;" name="dataId"/>
                        </div>
                    </div>
                    <div class="fRow">
                        <div class="fCol">
                            <div class="element">
                                <button id="verifyDataBtn" type="submit">@lang('header.submit')</button>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="fRow">
                        <div class="fCol input">
                            <a data-href="./api/resendVerifyCode.php" class="resendSuccess">Onay Kodunu Tekrar
                                Gönder</a>
                        </div>
                    </div>
                    <div class="fRow">
                        <div class="fCol input" style="font-size:10px; text-align:center;">**Formunuzun iletilmesi
                            için telefonunuza gelen kodu girmelisiniz.
                        </div>
                    </div> -->
                </form>
            </div>
            <form method="POST" action="/" accept-charset="UTF-8" id="form-talep">

                <input type="hidden" value="PolatPiyalePasaPremium" id="subject" name="subject">
                <input type="hidden" value="PolatPiyalePasaPremium" id="form_subject" name="form_subject">
                <input type="hidden" value="" id="utm_campaign" name="utm_campaign">
                <input type="hidden" value="" id="utm_medium" name="utm_medium">
                <input type="hidden" value="" id="utm_source" name="utm_source">
                <input type="hidden" value="" id="gclid" name="gclid">
                <input type="hidden" value="{{ $locale }}" id="language" name="language">

                <div class="form">
                    <p class="info">@lang('header.form1') <span>@lang('header.form2') </span></p>
                    <div class="fRow">
                        <div class="fCol input">
                            <div class="element"><input type="text" name="name" id="dummyName01"
                                                        placeholder="@lang('header.form_name')"/></div>
                        </div>
                    </div>
                    <div class="fRow">
                        <div class="fCol input">
                            <div class="element"><input type="text" name="lastname" id="dummyName07"
                                                        placeholder="@lang('header.form_surname')"/></div>
                        </div>
                    </div>
                    <div class="fRow">
                        <div class="fCol phone-input input">
                            <div class="element">
                                <input class="intltelinput" type="text"/>
                                <input class="hidden phoneInput" type="text" name="phoneNumber" id="dummyName03"
                                       placeholder="@lang('header.form_phone')"/>
                            </div>
                        </div>
                    </div>
                    <div class="fRow">
                        <div class="fCol input">
                            <div class="element"><input type="text" name="email" id="dummyName02"
                                                        placeholder="@lang('header.form_email')"/></div>
                        </div>
                    </div>

                    <div class="form-item textarea" style="display:none;">
                        <label for="dummyName04">Mesajınız &amp; G&ouml;r&uuml;şleriniz</label>
                        <textarea name="message" id="dummyName04" maxlength="2000"></textarea>
                        <div class="char-info">Max 2000 kalan karakter: <span class="say">2000</span></div>
                        <label for="message" generated="true" class="error"></label>
                    </div>
                    <div class="fRow">
                        <div class="fCol checkbox">
                            <input type="checkbox" name="private" value="1" id="dummyName05"/><label
                                for="dummyName05"><span></span>@lang('header.form_check')</label>
                        </div>
                    </div>
                    <div class="fRow">
                        <div class="fCol checkbox">
                            <input type="checkbox" required name="agreed" value="1" id="dummyName06"/><label
                                for="dummyName06"><span></span>
                                @lang('header.form_check2')
                            </label>
                        </div>
                    </div>
                    <div class="fRow">
                        <div class="fCol">
                            <div class="element">
                                <button id="send_button" type="submit">@lang('header.send')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="formFooter">
            <a href="tel:+9053338139090">+90 533 813 90 90</a>
            <a href="tel:+902122120404">+90 212 212 04 04</a>
        </div>
    </div>
</aside>

<div style="display:none;">

    <div class="overlay menu-close"></div>
    <header>
        <div id="loader"><span></span></div>
        <ul id="top-menu">
            <li><i class="icon-world"></i><a href="./en/" class="lang">EN</a> / <a
                    href="./ar/" class="lang right-lang">AR</a></li>
            <li><a href="https://www.youtube.com/watch?v=IA1mxcuG_5k" class="modal-open vid"
                   title="Reklam Filmlerimizi izlemek için tıklayın"><i class="icon-play"></i>Reklam
                    Filmlerimiz</a></li>
            <li><a href="{{asset('front/docs/piyalepasa2-tr/')}}" target="_blank" rel="noopener"
                   title="Kataloğumuzu indirmek için tıklayın"><i class="icon-catalog"></i>KATALOG</a></li>
            <li><a href="{{asset('front/yasamkilavuzu/')}}" target="_blank" rel="noopener"
                   title="YAŞAM KILAVUZU"><i class="icon-plan"></i>YAŞAM KILAVUZU</a></li>

            <li style="padding-left: 20px;">
                <div class="social-bar">
                    @foreach($settings->social_network as $platform => $url)
                        @if($url !== null)
                            <a href="{{ $url }}" target="_blank" rel="noopener"
                               class="icon-{{ $platform }}{{ $platform === 'youtube' ? '-play' : '-1' }}"></a>
                        @endif
                    @endforeach
                </div>
            </li>
            <li><a class="menu-toggle" href="javascript:;" title="Menü"><i class="icon-menu"></i>MEN&Uuml;</a></li>

        </ul>
    </header>
    <p id="scroller" class="go-to" data-href="1">SAYFAYI<span></span>KAYDIRIN
    <p>
</div>
