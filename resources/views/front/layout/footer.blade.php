@php
    use Datlechin\FilamentMenuBuilder\Models\Menu;
        $web_menu = Menu::location('header');
        $settings = \Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting::find(1);
@endphp
<footer class="section no-height">
    <nav id="footer-menu">
        <ul>
            @foreach($web_menu->menuItems as $item)
                @if($item->children->isNotEmpty())
                    <li>
                        <strong>{{ $item->title }}</strong>
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
                        <a href="{{ $item->url }}"><strong>{{ $item->title }}</strong></a>
                    </li>
                @endif
            @endforeach

        </ul>
    </nav>
    <div class="contact-menu" style="display: none;">
        </div>

    <div class="footerphones">
        <a href="tel:+902122120404">0212 212 04 04</a>
    </div>
    <div class="copyright-bar">
        <div class="ppasa-logo"><a href="/" title="piyalepasa"><img
                    src="{{asset('front/premium-theme/images/logoDark.svg')}}" alt="Piyalepaşa"></a></div>
        <div class="copy">2023 PİYALEPAŞA. T&Uuml;M HAKLARI SAKLIDIR.</div>
        <div class="social-bar">
            bizi takip edin
            @foreach($settings->social_network as $platform => $url)
                @if($url !== null)
                    <a href="{{ $url }}" target="_blank" rel="noopener"
                       class="icon-{{ $platform }}{{ $platform === 'youtube' ? '-play' : '-1' }}"></a>
                @endif
            @endforeach
        </div>
        <div class="polat-logo"><a href="/hakkimizda" target="_blank"
                                   rel="nofollow"><img src="{{asset('front/premium-theme/images/polat.svg')}}" alt="polat logo"/></a>
        </div>
    </div>
</footer>
<div id="modals" class="hidden">
    <div id="zoom-modal" class="modal zoom-modal"></div>
</div>
<div class="hidden">
    <div id="talep-formu" class="modal">
        <div class="codeFormData"
             style="display: none; width: 100%; height: 100%; background:#FFF; position: absolute; width: 100%; height: 100%; z-index: 5555; padding: 15px; left: 0px; top: 0px; border-radius: 0.5rem; box-sizing: border-box;">
            <a class="closeFormData"
               style="display: block; width: 40px; height: 40px; text-align: center; line-height: 40px; cursor: pointer; position: absolute; right: 0px; top: 0px;">×</a>
            <div class="form form-half"
                 style="position: absolute; transform: translate(-50%,-50%); left: 50%; top: 50%; ">
                <form class="phoneValidate" action="api/verifyCode.php">
                    <div class="form-item input">
                        <label>Onay Kodu</label>
                        <input type="text" name="code" minlength="4"/>
                        <input type="hiden" style="display: none;" name="phone"/>
                        <input type="hiden" style="display: none;" name="dataId"/>
                    </div>
                    <div class="form-item btn">
                        <button id="verifyDataBtn" style="width: 100%;" type="submit">Onayla</button>
                    </div>
                    <div class="form-item input">
                        <a data-href="api/resendVerifyCode.php" class="resendSuccess">Onay Kodunu Tekrar Gönder</a>
                    </div>
                    <div class="form-item input">
                        **Formunuzun iletilmesi için telefonunuza gelen kodu girmelisiniz.
                    </div>
                </form>
                <script>
                    $(document).ready(function () {
                        $('.resendSuccess').click(function () {
                            var dataId = $('.phoneValidate input[name="dataId"]').val();
                            $.get($(this).data("href") + "?dataId=" + dataId, function (data) {
                                $.alert({title: 'Onay', content: data.returnText});
                            });
                        });
                        $('.closeFormData').click(function () {
                            $('.codeFormData').fadeOut();
                        });
                        $('.phoneValidate').submit(function (e) {
                            e.preventDefault();
                            $.get($(this).attr("action"), $(this).serialize(), function (data) {
                                if (data.status) {
                                    $(".codeFormData").fadeOut();
                                    sendFormData();
                                } else {
                                    $.alert({title: 'Hata', content: 'Onay kodunuz hatalı veya onaylanmadı.'});
                                }
                            })
                        });
                    });
                </script>
            </div>
        </div>
        <form method="POST" action="/" accept-charset="UTF-8" id="form-talep"><input
                name="_token" type="hidden" value="eXgavVALD4F03WM1EsRCdsI9jxGPkDJuUQYqdUyl">
            <div class="form">
                <p class="info">Formu doldurup g&ouml;nderdiğinizde yetkililerimiz en yakın zamanda sizinle irtibata
                    ge&ccedil;eceklerdir</p>
                <div class="form-half left">
                    <div class="form-item input">
                        <label for="dummyName01">Adınız Soyadınız</label>
                        <input type="text" name="name" id="dummyName01"/>
                    </div>
                    <div class="form-item input">
                        <label for="dummyName02">E-posta Adresiniz</label>
                        <input type="text" name="email" id="dummyName02"/>
                    </div>
                </div>
                <div class="form-half right">
                    <div class="form-item phone-input input">
                        <input class="intltelinput" type="text"/>
                        <input class="hidden phoneInput" type="text" name="phoneNumber" id="dummyName03"/>
                    </div>
                </div>
                <div class="form-item textarea">
                    <label for="dummyName04">Mesajınız &amp; G&ouml;r&uuml;şleriniz</label>
                    <textarea name="message" id="dummyName04" maxlength="2000"></textarea>
                    <div class="char-info">Max 2000 kalan karakter: <span class="say">2000</span></div>
                    <label for="message" generated="true" class="error"></label>
                </div>
                <div class="form-item checkbox">
                    <input type="checkbox" name="private" value="1" id="dummyName05"/><label
                        for="dummyName05"><span></span>AB vatandaşıyım.</label>
                </div>

                <div class="form-item checkbox">
                    <input type="checkbox" required name="agreed" value="1" id="dummyName06"/><label
                        for="dummyName06"><span></span>
                        <button class="aydinlatma-popup-toggler">“Aydınlatma metni”</button>
                        ve
                        <button
                            class="acik-riza-popup-toggler">“Açık Rıza Beyanını”
                        </button>
                        okudum kabul ediyorum.
                    </label>
                </div>

                <div class="form-item btn">
                    <button id="send_button" data-pstv="content" type="submit">G&ouml;nder</button>
                </div>
                <input name="subject" type="hidden" value="Request Form">
            </div>
        </form>
    </div>
</div>
<div id="modal-acik-riza" class="modal modal-privacy">
    <div class="modal-bg" onclick="popup.close('modal-acik-riza');"></div>
    <div class="modal-wrapper">
        <div class="modal-content">
            <p style="font-weight:bold;">KİŞİSEL VERİLERİN İŞLENMESİNE, AKTARILMASINA ve ELEKTRONİK TİCARETE İLİŞKİN
                AÇIK RIZA BEYANI</p>
            <p><br/></p>
            <p>6698 sayılı Kişisel Verilerin Korunması Kanunu gereğince kişisel verilerimin Piyalepaşa Gayrimenkul
                Geliştirme Yatırımı ve Tic. A.Ş. (“PİYALEPAŞA”) tarafından hangi amaçla işleneceği, işlenen kişisel
                verilerin kimlere ve hangi amaçla aktarılabileceği, kişisel veri toplamanın yöntemi ve hukuki sebebi
                ve Kanun’un 11. Maddesinde sayılan diğer haklarım hususunda bilgilendirildim. </p>
            <br>
            <p>İnceleyip okuduğum "İletişim ve Bilgi Talep Formlarında İşlenen Kişisel Verilere Yönelik Aydınlatma
                Metni"nde belirtilen amaçlar ve kapsamla, yöntem ve hukuki sebeplerle sınırlı kalmak kaydıyla, ad
                soyad, e-posta, cep telefonu gibi kimlik ve iletişim kategorisindeki kişisel verilerimin, 6698
                sayılı Kişisel Verilerin Korunması Kanunu ve diğer ilgili mevzuata uygun olarak veri sorumlusu
                sıfatıyla PİYALEPAŞA tarafından işlenmesine, kişisel verilerimin, PİYALEPAŞA tarafından; şirketin
                aldığı ve sağladığı hizmetler çerçevesinde sözleşme imzaladığı kişiler ve onların iş birliği içinde
                olduğu üçüncü kişilere, PİYALEPAŞA ’ın yasal yükümlülüklerini yerine getirmesi ve PİYALEPAŞA
                tarafından sunulan ürün ve hizmetlerden müşterilerin en iyi şekilde faydalanması için çalışmalar
                yapılması amacıyla üçüncü kişilere (doğrudan ve dolaylı hissedarlar, yurt içi ve yurt dışı
                iştirakler ve bağlı ortaklıklar, PİYALEPAŞA çalışanları, PİYALEPAŞA tarafından destek hizmeti
                verilen veya hizmet alınan üçüncü kişiler, iş ortakları, ifa yardımcıları, danışman firmalar, grup
                şirketleri, tedarikçiler, özel kurum ve kuruluşlar ile kamu kurum ve kuruluşlarına) ve yetkili
                mercilere aktarılmasına, PİYALEPAŞA ve kişisel verilerimin mevzuata uygun şekilde aktarıldığı
                kimselerce tarafıma ürün ve hizmet tanıtımlarının yapılabilmesine, kampanya ve promosyonlar hakkında
                tarafımın bilgilendirilmesine, tarafıma, e-posta, SMS gibi muhtelif dijital iletişim kanalları ve
                telefon aracılığıyla reklam içerikli bildirimlerin gönderilmesine, herhangi bir etki altında
                kalmaksızın açık bir şekilde rıza verdiğimi, aydınlatma metnini okuduğumu ve anladığımı; kabul,
                beyan ve taahhüt ediyorum.</p>
            <br>
            <p><strong>Ret Hakkı ve Kullanımı</strong><br><br>
                Yukarıda belirtilen kişisel veri işleme faaliyetleri ile e-ileti gönderilmesine vereceğiniz açık
                rıza, reddetme hakkınızı kullanıncaya kadar geçerlidir. Red hakkınızın kullanılması, ancak açık
                rızanıza dayanılarak gönderilecek ticari elektronik iletilerin gönderimini ve bu nedenle kişisel
                verilerinizin işlenmesini engeller ve fakat Veri Sorumlusu ve Alıcı grupları ile aranızdaki herhangi
                bir hukuki işlemin geçerliliğini etkilemez, ETK’da yer alan diğer ilgili hükümlerin uygulanmasına
                engel olmaz. POLAT RET yazıp 7889’a kısa mesaj göndereceğiniz ret talebinizin, Şirketimize
                ulaşmasının hemen akabinde etki doğuracaktır.
            </p>
            <div class="text-right"><br/>
                <p>
                    <button class="btn btn-primary" onclick="popup.close('modal-acik-riza');">Tamam</button>
                </p>
            </div>
        </div>
    </div>
</div>
<div id="modal-aydinlatma" class="modal modal-privacy">
    <div class="modal-bg" onclick="popup.close('modal-aydinlatma');"></div>
    <div class="modal-wrapper">
        <div class="modal-content">
            <p style="font-weight:bold;">BAŞVURU FORMLARINDA İŞLENEN KİŞİSEL VERİLER HAKKINDA AYDINLATMA METNİ</p>
            <p><br/></p>
            <p>İmrahor Cad. Polat Ofis No:23 B Blok K:4 Kağıthane / İstanbul adresinde mukim Piyalepaşa Gayrimenkul
                Geliştirme Yatırımı ve Tic. A.Ş. (“PİYALEPAŞA”) olarak, işbu İletişim Formu’nda paylaşmış olduğunuz
                ad, soyad, telefon numarası, e-posta adresi tipindeki kişisel verileriniz;</p>
            <ul>
                <li>Piyalepaşa İstanbul projesi hakkında sizleri bilgilendirmek,</li>
                <li>Hizmet kalitesini artırmak, gayrimenkul pazarlama ve satışı süreçlerinde sizlerle iletişime
                    geçmek,
                </li>
                <li>Her türlü pazarlama, kampanya, tanıtım, reklam ve iletişim çalışmalarını yürütmek,</li>
            </ul>
            <p>amaçlarıyla sınırlı olarak, 6698 sayılı Kişisel Verileri Koruma Kanunu’nun (“Kanun”) 5/1 fıkrasında
                belirtilen hukuki sebebe dayalı şekilde sözlü, yazılı veya elektronik ortamda otomatik ve otomatik
                olmayan yöntemlerle toplanmaktadır. Yukarıda belirtilen kişisel verileriniz, yine yukarıda
                belirtilen amaçlarla sınırlı olmak kaydıyla Kanun’un 8/1 fıkrası uyarınca Polat Şirketler
                Topluluğuna bağlı olarak faaliyet gösteren şirketler, iştirakler, teşebbüsler ile yine şirketler
                topluluğumuz faaliyetlerinde iş ve proje ortaklıkları dahil olmak üzere her türlü iş ve işletme bağı
                sebebiyle ortak ve belirli bir ekonomik faaliyette bulunan ya da Veri işleme faaliyetine ilişkin
                ortak bir karar mekanizması bulunan veri sorumlularıyla, söz konusu tüzel kişiliğin hâkim ya da
                küçük, hissedar ya da ortaklarının konut projeleri ve tedarikçilerine aktarılacaktır. <strong>Bahsi
                    geçen *şirketler;</strong></p>
            <ul>
                <li>Polat Yönetim Danışmanlık Hizmetleri A.Ş</li>
                <li>Polat Kentsel Gayrimenkul Geliştirme A.Ş.</li>
                <li>Piyalepaşa Yönetim Danışmanlık A.Ş.</li>
                <li>Piyalepaşa Gayrimenkul Geliştirme Yatırımı Ve Ticaret A.Ş.</li>
                <li>Polat Holding A.Ş.</li>
                <li>Pd Real Estate Development Kft</li>
                <li>Apd Real EstateKft</li>
            </ul>
            <p><i>*sicilde de yer alan açık unvanlarıyla yukarıda belirtilen gerçek veya tüzel kişiliklerdir.</i>
            </p>
            <p>Dilediğiniz zaman Kanun’un 11. maddesinde belirtilen; </p>
            <ul>
                <li>Kişisel veri işlenip işlenmediğini öğrenme,</li>
                <li>Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme,</li>
                <li>Kişisel verilerin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme,
                </li>
                <li>Yurt içinde veya yurt dışında kişisel verilerin aktarıldığı üçüncü kişileri bilme,</li>
                <li>Kişisel verilerin eksik veya yanlış işlenmiş olması halinde bunların düzeltilmesini isteme,</li>
                <li>Kanun’un 7. maddesinde öngörülen şartlar çerçevesinde kişisel verilerin silinmesini veya yok
                    edilmesini isteme,
                </li>
                <li>Eksik veya yanlış işlenen kişisel verilerin düzeltilmesine ve silinmesine ya da yok edilmesine
                    ilişkin işlemlerin, kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini talep etme,
                </li>
                <li>İşlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin
                    kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme,
                </li>
                <li>Kişisel verilerin Kanun’a aykırı olarak işlenmesi sebebiyle zarara uğranması halinde zararın
                    giderilmesini talep etme,
                </li>
            </ul>
            <p>haklarınıza ilişkin başvurularınızı PİYALEPAŞA’ya iletebilirsiniz.</p><br>
            <p>Haklarınıza ve Kanunun uygulanmasına ilişkin başvurularınızı,</p><br>
            <p>Taleplerinizi açıkça belirtecek şekilde ıslak imzalı bir nüshasının bizzat elden veya noter aracılığı
                ile “İmrahor Cad. Polat Ofis No:23 B Blok K:4 Kağıthane / İstanbul” adresine iletilmesi,
                KEP (Kayıtlı Elektronik Posta) adresinizi, güvenli elektronik imzanızı, mobil imzanızı ya da
                tarafınızca PİYALEPAŞA’ya daha önce bildirilen ve PİYALEPAŞA’nın sisteminde kayıtlı bulunan
                elektronik posta adresinizi kullanmak suretiyle <a
                    href="mailto:infokvkk@piyalepasa.com.tr">infokvkk@piyalepasa.com.tr</a> adresine iletilmesi,
                yöntemlerinden biriyle yapabilirsiniz.</p>
            <br>
            <p>PİYALEPAŞA, bu kapsamdaki taleplere yazılı olarak cevap verilecekse, on sayfaya kadar ücret almadan;
                on sayfanın üzerindeki her sayfa için 1 Türk lirası işlem ücreti alarak yanıtlandıracaktır.
                Başvuruya cevabın CD, flash bellek gibi bir kayıt ortamında verilmesi halinde PİYALEPAŞA tarafından
                talep edilebilecek ücret kayıt ortamının maliyetini geçemeyecektir.</p>
            <div class="text-right"><br/>
                <div><strong><em>Piyalepaşa Gayrimenkul Geliştirme Yatırımı ve Tic. A.Ş.</em></strong></div>
                <br/>
                <p>
                    <button class="btn btn-primary" onclick="popup.close('modal-aydinlatma');">Tamam</button>
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    function popup() {
        popup.close = function (id) {
            document.getElementById(id).className = document.getElementById(id).className.replace('active', '');
        }
        popup.show = function (id) {
            document.getElementById(id).className += ' active';
        }
    }

    popup();
</script>
<div style="display:none;">
    <div id="aydinlatmaMetni">
        <div class="modal-content">
            <p style="font-weight:bold;">BAŞVURU FORMLARINDA İŞLENEN KİŞİSEL VERİLER HAKKINDA AYDINLATMA METNİ</p>
            <p><br></p>
            <p>İstiklal Mah. Piyalepaşa Bulvarı BLV. No:24 İç Kapı No:5 Beyoğlu/İstanbul adresinde mukim Piyalepaşa
                Gayrimenkul Geliştirme Yatırımı ve Tic. A.Ş. (“PİYALEPAŞA”) olarak, işbu İletişim Formu’nda
                paylaşmış olduğunuz ad, soyad, telefon numarası, e-posta adresi tipindeki kişisel verileriniz;</p>
            <ul>
                <li>Piyalepaşa İstanbul projesi hakkında sizleri bilgilendirmek,</li>
                <li>Hizmet kalitesini artırmak, gayrimenkul pazarlama ve satışı süreçlerinde sizlerle iletişime
                    geçmek,
                </li>
                <li>Her türlü pazarlama, kampanya, tanıtım, reklam ve iletişim çalışmalarını yürütmek,</li>
            </ul>
            <p>amaçlarıyla sınırlı olarak, 6698 sayılı Kişisel Verileri Koruma Kanunu’nun (“Kanun”) 5/1 fıkrasında
                belirtilen hukuki sebebe dayalı şekilde sözlü, yazılı veya elektronik ortamda otomatik ve otomatik
                olmayan yöntemlerle toplanmaktadır. Yukarıda belirtilen kişisel verileriniz, yine yukarıda
                belirtilen amaçlarla sınırlı olmak kaydıyla Kanun’un 8/1 fıkrası uyarınca Polat Şirketler
                Topluluğuna bağlı olarak faaliyet gösteren şirketler, iştirakler, teşebbüsler ile yine şirketler
                topluluğumuz faaliyetlerinde iş ve proje ortaklıkları dahil olmak üzere her türlü iş ve işletme bağı
                sebebiyle ortak ve belirli bir ekonomik faaliyette bulunan ya da Veri işleme faaliyetine ilişkin
                ortak bir karar mekanizması bulunan veri sorumlularıyla, söz konusu tüzel kişiliğin hâkim ya da
                küçük, hissedar ya da ortaklarının konut projeleri ve tedarikçilerine aktarılacaktır. <strong>Bahsi
                    geçen *şirketler;</strong></p>
            <ul>
                <li>Polat YönetimDanışmanlıkHizmetleri A.Ş.</li>
                <li>Polat KentselGayrimenkulGeliştirme A.Ş.</li>
                <li>Piyalepaşa YönetimDanışmanlık A.Ş.</li>
                <li>Piyalepaşa GayrimenkulGeliştirmeYatırımı Ve Ticaret A.Ş.</li>
                <li>Polat Holding A.Ş.</li>
                <li>Pd Real Estate Development Kft</li>
                <li>Apd Real Estate Kft</li>
            </ul>
            <p>*sicilde de yer alan açık unvanlarıyla yukarıda belirtilen gerçek veya tüzel kişiliklerdir.</p>
            <p>Dilediğiniz zaman Kanun’un 11. maddesinde belirtilen;</p>
            <br>
            <ul>
                <li>Kişisel veri işlenip işlenmediğini öğrenme,</li>
                <li>Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme,</li>
                <li>Kişisel verilerin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme,
                </li>
                <li>Yurt içinde veya yurt dışında kişisel verilerin aktarıldığı üçüncü kişileri bilme,</li>
                <li>Kişisel verilerin eksik veya yanlış işlenmiş olması halinde bunların düzeltilmesini isteme,</li>
                <li>Kanun’un 7. maddesinde öngörülen şartlar çerçevesinde kişisel verilerin silinmesini veya yok
                    edilmesini isteme,
                </li>
                <li>Eksik veya yanlış işlenen kişisel verilerin düzeltilmesine ve silinmesine ya da yok edilmesine
                    ilişkin işlemlerin, kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini talep etme,
                </li>
                <li>İşlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin
                    kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme,
                </li>
                <li>Kişisel verilerin Kanun’a aykırı olarak işlenmesi sebebiyle zarara uğranması halinde zararın
                    giderilmesini talep etme,
                </li>
            </ul>
            <p>haklarınıza ilişkin başvurularınızı PİYALEPAŞA’ya iletebilirsiniz.</p>
            <br>
            <p>Haklarınıza ve Kanunun uygulanmasına ilişkin başvurularınızı,</p>
            <p>Taleplerinizi açıkça belirtecek şekilde ıslak imzalı bir nüshasının bizzat elden veya noter aracılığı
                ile “İmrahor Cad. Polat Ofis No:23 B Blok K:4 Kağıthane / İstanbul” adresine iletilmesi,
                KEP (Kayıtlı Elektronik Posta) adresinizi, güvenli elektronik imzanızı, mobil imzanızı ya da
                tarafınızca PİYALEPAŞA’ya daha önce bildirilen ve PİYALEPAŞA’nın sisteminde kayıtlı bulunan
                elektronik posta adresinizi kullanmak suretiyle <a
                    href="mailto:infokvkk@piyalepasa.com.tr">infokvkk@piyalepasa.com.tr</a> adresine iletilmesi,
                yöntemlerinden biriyle yapabilirsiniz.
            </p>
            <br>
            <p>PİYALEPAŞA, bu kapsamdaki taleplere yazılı olarak cevap verilecekse, on sayfaya kadar ücret almadan;
                on sayfanın üzerindeki her sayfa için 1 Türk lirası işlem ücreti alarak yanıtlandıracaktır.
                Başvuruya cevabın CD, flash bellek gibi bir kayıt ortamında verilmesi halinde PİYALEPAŞA tarafından
                talep edilebilecek ücret kayıt ortamının maliyetini geçemeyecektir.</p>
            <div class="text-right"><br>
                <div><strong><em>Piyalepaşa Gayrimenkul Geliştirme Yatırımı ve Tic. A.Ş.</em></strong></div>
                <br>
            </div>
        </div>
    </div>
    <div id="acikRiza">
        <div class="modal-content">
            <p style="font-weight:bold;">AÇIK RIZA BEYANI VE İYS ONAYI</p>
            <p><br></p>
            <p>6698 sayılı Kişisel Verilerin Korunması Kanunu gereğince kişisel verilerimin Piyalepaşa Gayrimenkul
                Geliştirme Yatırımı ve Tic. A.Ş. (“PİYALEPAŞA”) tarafından hangi amaçla işleneceği, işlenen kişisel
                verilerin kimlere ve hangi amaçla aktarılabileceği, kişisel veri toplamanın yöntemi ve hukuki sebebi
                ve Kanun’un 11. Maddesinde sayılan diğer haklarım hususunda bilgilendirildim.</p>
            <br>
            <p>İnceleyip okuduğum "İletişim ve Bilgi Talep Formlarında İşlenen Kişisel Verilere Yönelik Aydınlatma
                Metni"nde belirtilen amaçlar ve kapsamla, yöntem ve hukuki sebeplerle sınırlı kalmak kaydıyla, ad
                soyad, e-posta, cep telefonu gibi kimlik ve iletişim kategorisindeki kişisel verilerimin, 6698
                sayılı Kişisel Verilerin Korunması Kanunu ve diğer ilgili mevzuata uygun olarak veri sorumlusu
                sıfatıyla PİYALEPAŞA tarafından işlenmesine, kişisel verilerimin, PİYALEPAŞA tarafından; şirketin
                aldığı ve sağladığı hizmetler çerçevesinde sözleşme imzaladığı kişiler ve onların iş birliği içinde
                olduğu üçüncü kişilere, PİYALEPAŞA ’ın yasal yükümlülüklerini yerine getirmesi ve PİYALEPAŞA
                tarafından sunulan ürün ve hizmetlerden müşterilerin en iyi şekilde faydalanması için çalışmalar
                yapılması amacıyla üçüncü kişilere (doğrudan ve dolaylı hissedarlar, yurt içi ve yurt dışı
                iştirakler ve bağlı ortaklıklar, PİYALEPAŞA çalışanları, PİYALEPAŞA tarafından destek hizmeti
                verilen veya hizmet alınan üçüncü kişiler, iş ortakları, ifa yardımcıları, danışman firmalar, grup
                şirketleri, tedarikçiler, özel kurum ve kuruluşlar ile kamu kurum ve kuruluşlarına) ve yetkili
                mercilere aktarılmasına, PİYALEPAŞA ve kişisel verilerimin mevzuata uygun şekilde aktarıldığı
                kimselerce tarafıma ürün ve hizmet tanıtımlarının yapılabilmesine, kampanya ve promosyonlar hakkında
                tarafımın bilgilendirilmesine, tarafıma, e-posta, SMS gibi muhtelif dijital iletişim kanalları ve
                telefon aracılığıyla reklam içerikli bildirimlerin gönderilmesine, herhangi bir etki altında
                kalmaksızın açık bir şekilde rıza verdiğimi, aydınlatma metnini okuduğumu ve anladığımı; kabul,
                beyan ve taahhüt ediyorum.</p>
            <br>
            <p><b>Ret Hakkı ve Kullanımı</b></p>
            <br>
            <p>Yukarıda belirtilen kişisel veri işleme faaliyetleri ile e-ileti gönderilmesine vereceğiniz açık
                rıza, reddetme hakkınızı kullanıncaya kadar geçerlidir. Red hakkınızın kullanılması, ancak açık
                rızanıza dayanılarak gönderilecek ticari elektronik iletilerin gönderimini ve bu nedenle kişisel
                verilerinizin işlenmesini engeller ve fakat Veri Sorumlusu ve Alıcı grupları ile aranızdaki herhangi
                bir hukuki işlemin geçerliliğini etkilemez, ETK’da yer alan diğer ilgili hükümlerin uygulanmasına
                engel olmaz. POLAT RET yazıp 7889’a kısa mesaj göndereceğiniz ret talebinizin, Şirketimize
                ulaşmasının hemen akabinde etki doğuracaktır. </p>
        </div>
    </div>
</div>
