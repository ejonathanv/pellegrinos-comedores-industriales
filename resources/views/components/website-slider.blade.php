<!-- Slider -->
<section id="home" class="page_slider slider-1">
    <div class="flexslider">
        <ul class="slides">
            <li class="ds cover-image text-center text-lg-left">
                <img src="{{ asset('img/portadas/slide1.webp') }}" alt="{{ __('website.slider.one.description') }}" width="1600" height="833" fetchpriority="high">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="intro_layers_wrapper">
                                <div class="intro_layers">
                                    <div class="intro_layer" data-animation="fadeInRight">
                                        <div class="divider-90"></div>
                                        <div class="d-inline-block text-center">
                                            <img src="{{ asset('img/pellegrinos_comedores_industriales_logo_blanco.svg') }}" alt="{{ config('business.name') }}" style="width: 500px; height: auto; display: inline-block !important; margin-bottom: 3rem">

                                            <h4>
                                                {{ __('website.slider.one.description') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="ls cover-image text-center text-lg-left">
                <img src="{{ asset('img/portadas/slide2.webp') }}" alt="{{ __('website.slider.two.description') }}" width="1600" height="833" loading="lazy">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="intro_layers_wrapper">
                                <div class="intro_layers">
                                    <div class="intro_layer" data-animation="fadeInRight">
                                        <div class="divider-90"></div>
                                        <div class="d-inline-block">
                                            <h3 class="intro_before_featured_word" style="color: #ffffff">
                                                {{ __('website.slider.two.title') }}
                                            </h3>
                                            <h2 class="intro_featured_word" style="color: #ffffff">
                                                {{ __('website.slider.two.description') }}
                                            </h2>
                                        </div>
                                    </div>
                                </div> <!-- eof .intro_layers -->
                            </div> <!-- eof .intro_layers_wrapper -->
                        </div> <!-- eof .col-* -->
                    </div><!-- eof .row -->
                </div><!-- eof .container-fluid -->
            </li>

            <li class="ls cover-image text-center text-lg-left">
                <img src="{{ asset('img/portadas/slide3.webp') }}" alt="{{ __('website.slider.three.description') }}" width="1600" height="833" loading="lazy">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="intro_layers_wrapper">
                                <div class="intro_layers">
                                    <div class="intro_layer" data-animation="fadeInRight">
                                        <div class="divider-90"></div>
                                        <div class="d-inline-block">
                                            <h3 class="intro_before_featured_word" style="color: #ffffff">
                                                {{ __('website.slider.three.title') }}
                                            </h3>
                                            <h2 class="intro_featured_word" style="color: #ffffff">
                                                {{ __('website.slider.three.description') }}
                                            </h2>
                                        </div>
                                    </div>
                                </div> <!-- eof .intro_layers -->
                            </div> <!-- eof .intro_layers_wrapper -->
                        </div> <!-- eof .col-* -->
                    </div><!-- eof .row -->
                </div><!-- eof .container-fluid -->
            </li>
        </ul>
    </div>
</section>