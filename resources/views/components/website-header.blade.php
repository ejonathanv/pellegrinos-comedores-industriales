<div class="header_absolute ds cover-background ">
    <header class="page_header ds ms s-overlay">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-1">
                    <a href="./" class="logo">
                        <img src="{{ asset('img/pellegrinos_comedores_industriales_logo_blanco.svg') }}" alt="img">
                    </a>
                </div>
                <div class="col-xl-6 col-lg-5 col-4">
                    <!-- main nav start -->
                    <nav class="top-nav">
                        <ul class="nav sf-menu">
                            <li>
                                <a href="#home">
                                    {{ __('website.nav.home') }}
                                </a>
                            </li>
                            <li>
                                <a href="#about">
                                    {{ __('website.nav.about') }}
                                </a>
                            </li>
                            <li>
                                <a href="#services">
                                    {{ __('website.nav.services') }}
                                </a>
                            </li>
                            <li>
                                <a href="#gallery">
                                    {{ __('website.nav.gallery') }}
                                </a>
                            </li>
                            <li>
                                <a href="#clients">
                                    {{ __('website.nav.clients') }}
                                </a>
                            </li>
                            <li>
                                <a href="#contact">
                                    {{ __('website.nav.contact') }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- eof main nav -->
                </div>

                <!-- Aqui vamos a agregar un boton para cambiar el idioma del sitio -->
                <div class="col-xl-2 col-lg-4 col-4 text-right">
                    @if(session()->get('locale') && session()->get('locale') == 'es')
                        <a href="{{ route('lang', 'en') }}">
                            <i class="fa fa-globe"></i>
                            <span class="d-none d-lg-inline">
                                English
                            </span>
                        </a>
                    @elseif(session()->get('locale') && session()->get('locale') == 'en')
                        <a href="{{ route('lang', 'es') }}">
                            <i class="fa fa-globe"></i>
                            <span class="d-none d-lg-inline">
                                Español
                            </span>
                        </a>
                    @else
                        <a href="{{ route('lang', 'en') }}">
                            <i class="fa fa-globe"></i>
                            <span class="d-none d-lg-inline">
                                English
                            </span>
                        </a>
                    @endif
                </div>

                <div class="col-xl-2 col-lg-3 col-4 text-right d-none d-lg-block social-media-icons">
                    <a href="https://www.facebook.com/PellegrinosCatering/" 
                        target="_blank"
                        style="color: #6382c4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/pellegrino_s_catering" 
                        target="_blank"
                        style="color: #E66490">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/526643756259"
                        target="_blank"
                        style="color: #25d366">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>

                <span class="toggle_menu"><span></span></span>
            </div>
        </div>
    </header>
</div>