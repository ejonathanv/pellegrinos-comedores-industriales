<footer class="page_footer ms s-py-90 s-py-xl-160 c-gutter-100">
    <div class="container">
        <div class="row" style="display:flex; align-items:start; justify-content: center">
            <div class="col-xl-4 col-lg-3 text-center text-lg-left animate" data-animation="fadeInUp">
                <div class="widget widget_text">
                    <img src="{{ asset('img/pellegrinos_comedores_industriales_logo.svg') }}" alt="{{ config('business.name') }}" width="300" height="212" loading="lazy" style="width: 300px; height: auto;">
                </div>
                <div class="divider-60 divider-lg-0"></div>
            </div>
            <div class="col-xl-4 col-lg-6 text-center text-lg-left animate" data-animation="fadeInUp">
                <div class="widget widget_text">
                    <h3 class="widget-title">
                        {{ __('website.contact.phone') }}
                    </h3>
                    <p>
                        <a href="tel:{{ config('business.phone') }}" data-track="click_phone">{{ config('business.phone_display') }}</a>
                    </p>
                    <h3 class="widget-title" style="margin-top: 0;">
                        {{ __('website.contact.email') }}
                    </h3>
                    <p>
                        <a href="mailto:{{ config('business.email') }}" data-track="click_email">{{ config('business.email') }}</a>
                    </p>
                    <h3 class="widget-title" style="margin-top: 0;">
                        {{ __('website.contact.address') }}
                    </h3>
                    <p>
                        {{ config('business.address.locality_display') }}
                    </p>
                    <div class="d-flex justify-content-center justify-content-lg-start social-media-icons">
                        <a href="{{ config('business.social.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook" style="color: #3b5998">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="{{ config('business.social.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram" style="color: #E1306C">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="{{ config('business.social.whatsapp') }}" target="_blank" rel="noopener" aria-label="WhatsApp" data-track="click_whatsapp" style="color: #25d366">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-3 text-center text-lg-left animate certificationsBox"
                data-animation="fadeInUp">
                <div class="widget widget_text">
                    <h3 class="widget-title flex items-start" style="margin-bottom: 20px;">
                        {{ __('website.contact.certifications.title') }}
                    </h3>
                    <div class="d-flex justify-content-start justify-content-lg-start" style="position: relative; margin-bottom: 20px;">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('img/quality_certificate.png') }}" alt="{{ __('website.contact.certifications.title') }}" height="75" loading="lazy" style="width: auto; height: 75px;">
                        </div>
                        <div>
                        </div>
                    </div>
                    <p class="justify-text" style="font-size: .8rem">
                        {{ __('website.contact.certifications.description') }}
                    </p>
                    <div class="certificationsList">
                        <div>
                            <span>
                                {{ __('website.contact.certifications.certification_one') }}
                            </span>
                        </div>
                        <div>
                            <span>
                                {{ __('website.contact.certifications.certification_two') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="page_copyright cs s-py-25">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <p>© <span class="copyright_year">
                        2022 - {{ date('Y') }}</span> {{ config('business.name') }}, {{ __('website.footer.rights') }}
                </p>
                <p class="small">
                    {{ __('website.footer.img_rights') }}
                </p>
            </div>
        </div>
    </div>
</section>