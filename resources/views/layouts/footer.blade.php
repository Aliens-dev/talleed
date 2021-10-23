<footer class="footer">
    <div class="container">
        <div class="footer-cols">
            <div class="footer-brand">
                <div class="footer-col-social">
                    <a href="">
                        <img src="/assets/img/twitter.svg" style="width:35px;height: 35px" alt="twitter taleed" />
                    </a>
                    <a href="">
                        <img src="/assets/img/youtube.svg" style="width:35px;height: 35px"  alt="youtube taleed" />
                    </a>
                    <a href="">
                        <img src="/assets/img/instagram.svg" style="width:30px;height: 35px"  alt="instagram taleed" />
                    </a>
                    <a href="">
                        <img src="/assets/img/facebook.svg" style="width:30px;height: 35px"  alt="facebook taleed" />
                    </a>
                    <a href="">
                        <img src="/assets/img/telegram.svg" style="width:35px;height: 35px"  alt="telegram taleed" />
                    </a>
                </div>
                <div class="footer-logo">
                    <img src="{{ asset('./assets/img/logo.svg') }}" alt="taleed" />
                </div>
                <div class="footer-rights">
                    جميع الحقوق محفوظة @ 2021 موقع تليد
                </div>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">
                    باقتنا
                </div>
                <div class="footer-rows">
                    <a href="https://www.facebook.com/medicodz/" class="footer-row">
                        Médico
                    </a>
                    <a href="https://www.facebook.com/easypeasydz/" class="footer-row">
                        Easy Peasy
                    </a>
                    <a href="https://www.facebook.com/TADeveloper/" class="footer-row">
                        The Algerian developer
                    </a>
                    <a href="https://www.facebook.com/TAVoiceover/" class="footer-row">
                        The Algerian voiceover
                    </a>
                    <a href="https://www.facebook.com/Turkbirlisan/" class="footer-row">
                        Turk bir lisan
                    </a>
                    <a href="https://www.facebook.com/Inshbook/" class="footer-row">
                        انصحني بكتاب
                    </a>
                    <a href="https://www.facebook.com/thesagaofhistory/" class="footer-row">
                        ملحمة التاريخ
                    </a>
                    <a href="https://www.facebook.com/FranDja-234182505189059/" class="footer-row">
                        FranDja
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">
                    عن تليد
                </div>
                <div class="footer-rows">
                    <a href="{{ route('about') }}" class="footer-row">
                        من نحن
                    </a>
                    <a href="{{ route('confidentiality') }}" class="footer-row">
                        سياسة الخصوصية
                    </a>
                    <a href="#" class="footer-row">
                        فريق الادارة
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">
                    تواصل معنا
                </div>
                <div class="footer-rows">
                    <a href="{{ route('contact') }}" class="footer-row">
                        تواصل معنا
                    </a>
                    <a href="{{ route('contact') }}" class="footer-row">
                        اعلن معنا
                    </a>
                    <a href="{{ route('contact') }}" class="footer-row">
                        مناصب شاغرة
                    </a>
                    <select id="toggle-style">
                        <option value="dark">Dark Mode</option>
                        <option value="light">Light Mode</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</footer>
