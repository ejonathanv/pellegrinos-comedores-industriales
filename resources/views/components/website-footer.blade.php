<footer class="page_footer ms s-py-90 s-py-xl-160 c-gutter-100">
    <div class="container">
        <div class="row" style="display:flex; align-items:start; justify-content: center">
            <div class="col-xl-4 col-lg-3 text-center text-lg-left animate" data-animation="fadeInUp">
                <div class="widget widget_text">
                    <img src="img/pellegrinos_comedores_industriales_logo.svg" alt="img" style="width: 300px; height: auto;">
                </div>
                <div class="divider-60 divider-lg-0"></div>
            </div>
            <div class="col-xl-4 col-lg-6 text-center text-lg-left animate" data-animation="fadeInUp">
                <div class="widget widget_text">
                    <h3 class="widget-title">
                        {{ __('website.contact.address') }}
                    </h3>
                    <p>
                        Calle 11 Norte 1001, Ciudad Industrial, 22444 Tijuana,  B.C.
                    </p>
                    <div class="d-flex justify-content-center justify-content-lg-start social-media-icons">
                        <a href="https://www.facebook.com/PellegrinosCatering/" target="_blank" style="color: #3b5998">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/pellegrino_s_catering" target="_blank" style="color: #E1306C">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/526643756259" target="_blank" style="color: #25d366">
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
                            <img src="{{ asset('img/quality_certificate.png') }}" alt="img" style="width: auto; height: 75px; margin-right: 15px;">
                            <img src="{{ asset('img/certificaciones/distintivo-h.jpg') }}" alt="img" style="width: auto; height: 80px;">
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
                        2022 - {{ date('Y') }}</span> {{ env('APP_NAME') }}, {{ __('website.footer.rights') }}
                </p>
                <p class="small">
                    {{ __('website.footer.img_rights') }}
                </p>
            </div>
        </div>
    </div>
</section>