<div class="header_absolute ds cover-background ">
    <header class="page_header ds ms s-overlay">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-5 col-1">
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
                            <li class="d-lg-none d-flex justify-content-start align-items-center">
                                <a href="{{ route('lang', 'es') }}">
                                    Español
                                </a>
                                <span class="mx-2">
                                    |
                                </span>
                                <a href="{{ route('lang', 'en') }}">
                                    English
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- eof main nav -->
                </div>

                <!-- Aqui vamos a agregar un boton para cambiar el idioma del sitio -->
                <div class="col-xl-3 col-lg-4 col-11 text-right d-lg-block d-none">
                    <a href="{{ route('lang', 'es') }}">
                        Español
                    </a>
                    <span class="mx-2">
                        |
                    </span>
                    <a href="{{ route('lang', 'en') }}">
                        English
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 text-right d-lg-block social-media-icons">
                    <a href="#" style="color: #6382c4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" style="color: #E66490">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" style="color: #25d366">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <span class="toggle_menu"><span></span></span>
            </div>
        </div>
    </header>
</div>